<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrera
 * 
 * @property int $id
 * @property string $codigo
 * @property string $nombre
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Pensum[] $pensums
 * @property Collection|Prelacione[] $prelaciones
 *
 * @package App\Models
 */
class Carrera extends Model
{
	protected $table = 'carreras';

	protected $casts = [
		'estatus' => 'bool'
	];

	protected $fillable = [
		'codigo',
		'nombre',
		'estatus'
	];

	public function pensums()
	{
		return $this->hasMany(Pensum::class, 'id_carrera');
	}

	public function prelaciones()
	{
		return $this->hasMany(Prelacione::class, 'id_carrera');
	}
}
