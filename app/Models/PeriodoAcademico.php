<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeriodoAcademico
 * 
 * @property int $id
 * @property string $nombre
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_culminacion
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Inscripcione[] $inscripciones
 * @property Collection|ProfesorSeccion[] $profesor_seccions
 *
 * @package App\Models
 */
class PeriodoAcademico extends Model
{
	protected $table = 'periodo_academicos';

	protected $casts = [
		'fecha_inicio' => 'datetime',
		'fecha_culminacion' => 'datetime',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'fecha_inicio',
		'fecha_culminacion',
		'estatus'
	];

	public function inscripciones()
	{
		return $this->hasMany(Inscripcione::class, 'id_periodo_academico');
	}

	public function profesor_seccions()
	{
		return $this->hasMany(ProfesorSeccion::class, 'id_periodo_academico');
	}
}
