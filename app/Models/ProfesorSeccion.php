<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfesorSeccion
 * 
 * @property int $id
 * @property int $id_usuario
 * @property int $id_seccion
 * @property int $id_materia
 * @property int $id_carrera
 * @property int $id_periodo_academico
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Carrera $carrera
 * @property Materia $materia
 * @property PeriodoAcademico $periodo_academico
 * @property Seccione $seccione
 * @property Usuario $usuario
 * @property Collection|Clase[] $clases
 * @property Collection|Horario[] $horarios
 *
 * @package App\Models
 */
class ProfesorSeccion extends Model
{
	protected $table = 'profesor_seccion';

	protected $casts = [
		'id_usuario' => 'int',
		'id_seccion' => 'int',
		'id_materia' => 'int',
		'id_carrera' => 'int',
		'id_periodo_academico' => 'int',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'id_usuario',
		'id_seccion',
		'id_materia',
		'id_carrera',
		'id_periodo_academico',
		'estatus'
	];

	public function carrera()
	{
		return $this->belongsTo(Carrera::class, 'id_carrera');
	}

	public function materia()
	{
		return $this->belongsTo(Materia::class, 'id_materia');
	}

	public function periodo_academico()
	{
		return $this->belongsTo(PeriodoAcademico::class, 'id_periodo_academico');
	}

	public function seccione()
	{
		return $this->belongsTo(Seccione::class, 'id_seccion');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function clases()
	{
		return $this->hasMany(Clase::class, 'id_profesor_seccion');
	}

	public function horarios()
	{
		return $this->hasMany(Horario::class, 'id_profesor_seccion');
	}
}
