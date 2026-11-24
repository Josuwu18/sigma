<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Override;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use HasFactory, HasApiTokens, Notifiable;

	protected $table = 'usuarios';

	protected $casts = [
		'estatus' => 'boolean'
	];

	protected $hidden = [
		'clave',
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

	#[Override]
	public function getAuthPassword()
	{
		return $this->clave;
	}

	public function rols()
	{
		return $this->belongsToMany(Rol::class, 'usuario_rol', 'id_usuarios', 'id_rol')
			->withPivot('id', 'estatus')
			->withTimestamps();
	}
}
