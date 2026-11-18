<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeriodoAcademico
 * 
 * @property int $id
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_culminacion
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
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
		'fecha_inicio',
		'fecha_culminacion',
		'estatus'
	];
}
