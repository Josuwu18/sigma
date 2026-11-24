<?php

namespace Database\Seeders;

use App\Models\Usuario;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear o verificar el rol Administrador
        $rolAdmin = Role::firstOrCreate(
            ['nombre' => 'Administrador'],
            [
                'descripcion' => 'Acceso total a todos los módulos del sistema SIGMA',
                'estatus' => 1,
            ]
        );

        // 2. Crear o verificar el usuario administrador en la tabla 'usuarios'
        $admin = Usuario::firstOrCreate(
            ['correo' => 'admin@sigma.com'],
            [
                'nombres'          => 'Administrador',
                'apellidos'        => 'Sistema SIGMA',
                'cedula'           => 'V-00000000',
                'genero'           => 'Masculino',
                'fecha_Nacimiento' => '1990-01-01',
                'estado'           => 'Carabobo',
                'municipio'        => 'Guacara',
                'parroquia'        => 'Guacara',
                'telefono'         => '04120000000',
                'clave'            => Hash::make('admin_sigma'),
                'estatus'          => 1,
            ]
        );

        // 3. Vincular el usuario con el rol en la tabla pivote 'usuario_rol'
        DB::table('usuario_rol')->updateOrInsert(
            [
                'id_usuarios' => $admin->id,
                'id_rol'      => $rolAdmin->id,
            ],
            [
                'estatus'    => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}