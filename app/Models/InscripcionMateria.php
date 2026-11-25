<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InscripcionMateria
 * 
 * @property int $id
 * @property int $id_inscripcion
 * @property int $id_profesor_seccion
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Inscripcione $inscripcione
 * @property ProfesorSeccion $profesor_seccion
 *
 * @package App\Models
 */
class InscripcionMateria extends Model
{
	protected $table = 'inscripcion_materias';

	protected $casts = [
		'id_inscripcion' => 'int',
		'id_profesor_seccion' => 'int',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'id_inscripcion',
		'id_profesor_seccion',
		'estatus'
	];

	public function inscripcione()
	{
		return $this->belongsTo(Inscripcione::class, 'id_inscripcion');
	}

	public function profesor_seccion()
	{
		return $this->belongsTo(ProfesorSeccion::class, 'id_profesor_seccion');
	}
}
