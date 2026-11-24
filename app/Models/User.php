<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'usuarios';

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'estatus' => 'boolean',
    ];

    protected $hidden = [
        'clave',
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
        'estatus',
    ];

    public function getAuthPassword()
    {
        return $this->clave;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'usuario_rol', 'id_usuarios', 'id_rol')
                    ->withPivot('id', 'estatus')
                    ->withTimestamps();
    }

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