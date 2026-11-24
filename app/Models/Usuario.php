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
 * @property Carbon $fecha_nacimiento
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
 * @property Collection|Asistencia[] $asistencias
 * @property Collection|Inscripcione[] $inscripciones
 * @property Collection|ProfesorSeccion[] $profesor_seccions
 * @property Collection|UsuarioRol[] $usuario_rols
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';

	protected $casts = [
		'fecha_nacimiento' => 'datetime',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'nombres',
		'apellidos',
		'cedula',
		'genero',
		'fecha_nacimiento',
		'estado',
		'municipio',
		'parroquia',
		'telefono',
		'correo',
		'clave',
		'estatus'
	];

	public function asistencias()
	{
		return $this->hasMany(Asistencia::class, 'id_usuario');
	}

	public function inscripciones()
	{
		return $this->hasMany(Inscripcione::class, 'id_usuario');
	}

	public function profesor_seccions()
	{
		return $this->hasMany(ProfesorSeccion::class, 'id_usuario');
	}

	public function usuario_rols()
	{
		return $this->hasMany(UsuarioRol::class, 'id_usuarios');
	}
}
