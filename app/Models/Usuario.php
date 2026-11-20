<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $cedula
 * @property string $genero
 * @property Carbon $fecha_Nacimiento
 * @property string $estado
 * @property string $municipio
 * @property string $parroquia
 * @property string $telefono
 * @property string $correo
 * @property string $clave
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Rol[] $rols
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';

	protected $casts = [
		'fecha_Nacimiento' => 'datetime',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'nombres',
		'apellidos',
		'cedula',
		'genero',
		'fecha_Nacimiento',
		'estado',
		'municipio',
		'parroquia',
		'telefono',
		'correo',
		'clave',
		'estatus'
	];

	public function rols()
	{
		return $this->belongsToMany(Rol::class, 'usuario_rol', 'id_usuarios', 'id_rol')
					->withPivot('id', 'estatus')
					->withTimestamps();
	}
}
