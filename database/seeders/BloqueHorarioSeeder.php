<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloqueHorarioSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // 14 bloques académicos de 45 min continuos (07:00 AM a 05:30 PM)
        // Escalable: si en el futuro se abre turno noche, se agregan del Bloque 15 en adelante con turno 'noche'
        $bloques = [
            // --- TURNO MAÑANA (Bloques 1 al 7) ---
            ['nombre' => 'Bloque 1',  'hora_inicio' => '07:00:00', 'hora_fin' => '07:45:00', 'turno' => 'mañana'],
            ['nombre' => 'Bloque 2',  'hora_inicio' => '07:45:00', 'hora_fin' => '08:30:00', 'turno' => 'mañana'],
            ['nombre' => 'Bloque 3',  'hora_inicio' => '08:30:00', 'hora_fin' => '09:15:00', 'turno' => 'mañana'],
            ['nombre' => 'Bloque 4',  'hora_inicio' => '09:15:00', 'hora_fin' => '10:00:00', 'turno' => 'mañana'],
            ['nombre' => 'Bloque 5',  'hora_inicio' => '10:00:00', 'hora_fin' => '10:45:00', 'turno' => 'mañana'],
            ['nombre' => 'Bloque 6',  'hora_inicio' => '10:45:00', 'hora_fin' => '11:30:00', 'turno' => 'mañana'],
            ['nombre' => 'Bloque 7',  'hora_inicio' => '11:30:00', 'hora_fin' => '12:15:00', 'turno' => 'mañana'],

            // --- TURNO TARDE (Bloques 8 al 14) ---
            ['nombre' => 'Bloque 8',  'hora_inicio' => '12:15:00', 'hora_fin' => '13:00:00', 'turno' => 'tarde'],
            ['nombre' => 'Bloque 9',  'hora_inicio' => '13:00:00', 'hora_fin' => '13:45:00', 'turno' => 'tarde'],
            ['nombre' => 'Bloque 10', 'hora_inicio' => '13:45:00', 'hora_fin' => '14:30:00', 'turno' => 'tarde'],
            ['nombre' => 'Bloque 11', 'hora_inicio' => '14:30:00', 'hora_fin' => '15:15:00', 'turno' => 'tarde'],
            ['nombre' => 'Bloque 12', 'hora_inicio' => '15:15:00', 'hora_fin' => '16:00:00', 'turno' => 'tarde'],
            ['nombre' => 'Bloque 13', 'hora_inicio' => '16:00:00', 'hora_fin' => '16:45:00', 'turno' => 'tarde'],
            ['nombre' => 'Bloque 14', 'hora_inicio' => '16:45:00', 'hora_fin' => '17:30:00', 'turno' => 'tarde'],
        ];

        foreach ($bloques as $bloque) {
            DB::table('bloque_horario')->updateOrInsert(
                ['nombre' => $bloque['nombre']],
                [
                    'hora_inicio' => $bloque['hora_inicio'],
                    'hora_fin'    => $bloque['hora_fin'],
                    'turno'       => $bloque['turno'],
                    'estatus'     => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ]
            );
        }
    }
}