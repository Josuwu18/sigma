<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pensum
 * 
 * @property int $id
 * @property int $id_carrera
 * @property int $id_semestre
 * @property int $id_materia
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Carrera $carrera
 * @property Materia $materia
 * @property Semestre $semestre
 *
 * @package App\Models
 */
class Pensum extends Model
{
	protected $table = 'pensums';

	protected $casts = [
		'id_carrera' => 'int',
		'id_semestre' => 'int',
		'id_materia' => 'int',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'id_carrera',
		'id_semestre',
		'id_materia',
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

	public function semestre()
	{
		return $this->belongsTo(Semestre::class, 'id_semestre');
	}
}
