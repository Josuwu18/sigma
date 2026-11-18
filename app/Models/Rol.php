<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Permiso[] $permisos
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rols';

	protected $casts = [
		'estatus' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'estatus'
	];

	public function permisos()
	{
		return $this->belongsToMany(Permiso::class, 'rol_permisos', 'id_rol', 'id_permiso')
					->withPivot('id', 'id_modulo', 'estatus')
					->withTimestamps();
	}

	public function usuarios()
	{
		return $this->belongsToMany(Usuario::class, 'usuario_rol', 'id_rol', 'id_usuarios')
					->withPivot('id', 'estatus')
					->withTimestamps();
	}
}
