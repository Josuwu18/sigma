<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|RolPermiso[] $rol_permisos
 * @property Collection|UsuarioRol[] $usuario_rols
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';

	protected $casts = [
		'estatus' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'estatus'
	];

	public function rol_permisos()
	{
		return $this->hasMany(RolPermiso::class, 'id_rol');
	}

	public function usuario_rols()
	{
		return $this->hasMany(UsuarioRol::class, 'id_rol');
	}
}
