<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BloqueHorario
 * 
 * @property int $id
 * @property string $nombre
 * @property Carbon $hora_inicio
 * @property Carbon $hora_fin
 * @property string $turno
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Horario[] $horarios
 *
 * @package App\Models
 */
class BloqueHorario extends Model
{
	protected $table = 'bloque_horario';

	protected $casts = [
		'hora_inicio' => 'datetime',
		'hora_fin' => 'datetime',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'hora_inicio',
		'hora_fin',
		'turno',
		'estatus'
	];

	public function horarios()
	{
		return $this->hasMany(Horario::class, 'id_bloque_horario');
	}
}
