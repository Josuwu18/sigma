<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Clase
 * 
 * @property int $id
 * @property int $id_profesor_seccion
 * @property Carbon $fecha
 * @property Carbon|null $hora_inicio
 * @property Carbon|null $hora_fin
 * @property string|null $tema_visto
 * @property string $estado_clase
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ProfesorSeccion $profesor_seccion
 * @property Collection|Asistencia[] $asistencias
 *
 * @package App\Models
 */
class Clase extends Model
{
	protected $table = 'clases';

	protected $casts = [
		'id_profesor_seccion' => 'int',
		'fecha' => 'datetime',
		'hora_inicio' => 'datetime',
		'hora_fin' => 'datetime',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'id_profesor_seccion',
		'fecha',
		'hora_inicio',
		'hora_fin',
		'tema_visto',
		'estado_clase',
		'estatus'
	];

	public function profesor_seccion()
	{
		return $this->belongsTo(ProfesorSeccion::class, 'id_profesor_seccion');
	}

	public function asistencias()
	{
		return $this->hasMany(Asistencia::class, 'id_clase');
	}
}
