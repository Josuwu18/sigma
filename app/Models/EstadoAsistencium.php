<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadoAsistencium
 * 
 * @property int $id
 * @property string $nombre
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Asistencia[] $asistencias
 *
 * @package App\Models
 */
class EstadoAsistencium extends Model
{
	protected $table = 'estado_asistencia';

	protected $casts = [
		'estatus' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'estatus'
	];

	public function asistencias()
	{
		return $this->hasMany(Asistencia::class, 'id_estado_asistencia');
	}
}
