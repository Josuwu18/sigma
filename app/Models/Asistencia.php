<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencia
 * 
 * @property int $id
 * @property int $id_clase
 * @property int $id_usuario
 * @property int $id_estado_asistencia
 * @property string|null $observacion
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Clase $clase
 * @property EstadoAsistencium $estado_asistencium
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Asistencia extends Model
{
	protected $table = 'asistencias';

	protected $casts = [
		'id_clase' => 'int',
		'id_usuario' => 'int',
		'id_estado_asistencia' => 'int',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'id_clase',
		'id_usuario',
		'id_estado_asistencia',
		'observacion',
		'estatus'
	];

	public function clase()
	{
		return $this->belongsTo(Clase::class, 'id_clase');
	}

	public function estado_asistencium()
	{
		return $this->belongsTo(EstadoAsistencium::class, 'id_estado_asistencia');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
