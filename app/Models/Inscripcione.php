<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inscripcione
 * 
 * @property int $id
 * @property int $id_usuario
 * @property int $id_carrera
 * @property int $id_semestre
 * @property int $id_seccion
 * @property int $id_periodo_academico
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Carrera $carrera
 * @property PeriodoAcademico $periodo_academico
 * @property Seccione $seccione
 * @property Semestre $semestre
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Inscripcione extends Model
{
	protected $table = 'inscripciones';

	protected $casts = [
		'id_usuario' => 'int',
		'id_carrera' => 'int',
		'id_semestre' => 'int',
		'id_seccion' => 'int',
		'id_periodo_academico' => 'int',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'id_usuario',
		'id_carrera',
		'id_semestre',
		'id_seccion',
		'id_periodo_academico',
		'estatus'
	];

	public function carrera()
	{
		return $this->belongsTo(Carrera::class, 'id_carrera');
	}

	public function periodo_academico()
	{
		return $this->belongsTo(PeriodoAcademico::class, 'id_periodo_academico');
	}

	public function seccione()
	{
		return $this->belongsTo(Seccione::class, 'id_seccion');
	}

	public function semestre()
	{
		return $this->belongsTo(Semestre::class, 'id_semestre');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
