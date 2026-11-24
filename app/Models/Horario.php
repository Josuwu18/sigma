<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 * 
 * @property int $id
 * @property int $id_profesor_seccion
 * @property int $id_bloque_horario
 * @property string $dia_semana
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property BloqueHorario $bloque_horario
 * @property ProfesorSeccion $profesor_seccion
 *
 * @package App\Models
 */
class Horario extends Model
{
	protected $table = 'horarios';

	protected $casts = [
		'id_profesor_seccion' => 'int',
		'id_bloque_horario' => 'int',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'id_profesor_seccion',
		'id_bloque_horario',
		'dia_semana',
		'estatus'
	];

	public function bloque_horario()
	{
		return $this->belongsTo(BloqueHorario::class, 'id_bloque_horario');
	}

	public function profesor_seccion()
	{
		return $this->belongsTo(ProfesorSeccion::class, 'id_profesor_seccion');
	}
}
