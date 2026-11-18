<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Prelacione
 * 
 * @property int $id
 * @property int $id_carrera
 * @property int $id_materia_prelada
 * @property int $id_materia_preladora
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Carrera $carrera
 * @property Materia $materia
 *
 * @package App\Models
 */
class Prelacione extends Model
{
	protected $table = 'prelaciones';

	protected $casts = [
		'id_carrera' => 'int',
		'id_materia_prelada' => 'int',
		'id_materia_preladora' => 'int',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'id_carrera',
		'id_materia_prelada',
		'id_materia_preladora',
		'estatus'
	];

	public function carrera()
	{
		return $this->belongsTo(Carrera::class, 'id_carrera');
	}

	public function materia()
	{
		return $this->belongsTo(Materia::class, 'id_materia_preladora');
	}
}
