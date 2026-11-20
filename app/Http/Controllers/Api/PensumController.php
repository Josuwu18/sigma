<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PensumController extends Controller
{
    // 1. Listar todas las carreras activas
    public function carreras(): JsonResponse
    {
        $carreras = DB::table('carreras')
            ->where('estatus', 1)
            ->select('id', 'codigo', 'nombre')
            ->get();

        return response()->json([
            'status' => 'ok',
            'data' => $carreras,
        ]);
    }

    // 2. Obtener el pensum completo de una carrera agrupado por semestre con sus prelaciones
    public function pensumPorCarrera(int $idCarrera): JsonResponse
    {
        $carrera = DB::table('carreras')->where('id', $idCarrera)->first();

        if (!$carrera) {
            return response()->json(['status' => 'error', 'mensaje' => 'Carrera no encontrada'], 404);
        }

        // Obtener materias del pensum de esa carrera
        $registros = DB::table('pensums as p')
            ->join('semestres as s', 'p.id_semestre', '=', 's.id')
            ->join('materias as m', 'p.id_materia', '=', 'm.id')
            ->join('tipo_materia as tm', 'm.id_tipo_materia', '=', 'tm.id')
            ->where('p.id_carrera', $idCarrera)
            ->where('p.estatus', 1)
            ->orderBy('s.id')
            ->orderBy('m.codigo')
            ->select(
                's.id as id_semestre',
                's.nombre as semestre',
                'm.id as id_materia',
                'm.codigo',
                'm.nombre as materia',
                'p.unidades_credito as uc',
                'tm.nombre as tipo'
            )
            ->get();

        // Obtener prelaciones de esa carrera
        $prelaciones = DB::table('prelaciones as pr')
            ->join('materias as m_req', 'pr.id_materia_preladora', '=', 'm_req.id')
            ->where('pr.id_carrera', $idCarrera)
            ->where('pr.estatus', 1)
            ->select('pr.id_materia_prelada', 'm_req.codigo', 'm_req.nombre')
            ->get()
            ->groupBy('id_materia_prelada');

        // Agrupar por semestre y adjuntar prelaciones a cada materia
        $semestresAgrupados = $registros->groupBy('semestre')->map(function ($materias, $nombreSemestre) use ($prelaciones) {
            return [
                'semestre' => $nombreSemestre,
                'total_uc' => $materias->sum('uc'),
                'materias' => $materias->map(function ($m) use ($prelaciones) {
                    $reqs = $prelaciones->get($m->id_materia, collect())->map(function ($r) {
                        return $r->codigo . ' (' . $r->nombre . ')';
                    })->values();

                    return [
                        'codigo' => $m->codigo,
                        'nombre' => $m->materia,
                        'uc' => $m->uc,
                        'tipo' => $m->tipo,
                        'prelaciones' => $reqs,
                    ];
                })->values(),
            ];
        })->values();

        return response()->json([
            'status' => 'ok',
            'carrera' => $carrera,
            'pensum' => $semestresAgrupados,
        ]);
    }
}