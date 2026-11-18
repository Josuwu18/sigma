<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuarioRol
 * 
 * @property int $id
 * @property int $id_usuarios
 * @property int $id_rol
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Rol $rol
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class UsuarioRol extends Model
{
	protected $table = 'usuario_rol';

	protected $casts = [
		'id_usuarios' => 'int',
		'id_rol' => 'int',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'id_usuarios',
		'id_rol',
		'estatus'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'id_rol');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuarios');
	}
}
