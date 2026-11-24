<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RolPermiso
 * 
 * @property int $id
 * @property int $id_rol
 * @property int $id_permiso
 * @property int $id_modulo
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Modulo $modulo
 * @property Permiso $permiso
 * @property Role $role
 *
 * @package App\Models
 */
class RolPermiso extends Model
{
	protected $table = 'rol_permisos';

	protected $casts = [
		'id_rol' => 'int',
		'id_permiso' => 'int',
		'id_modulo' => 'int',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'id_rol',
		'id_permiso',
		'id_modulo',
		'estatus'
	];

	public function modulo()
	{
		return $this->belongsTo(Modulo::class, 'id_modulo');
	}

	public function permiso()
	{
		return $this->belongsTo(Permiso::class, 'id_permiso');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'id_rol');
	}
}
