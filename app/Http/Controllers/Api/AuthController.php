<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'user' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Busca por correo o por cédula (cambia 'cedula' si tu columna en la tabla users tiene otro nombre)
        $usuario = User::where('email', $request->user)
            ->orWhere('cedula', $request->user)
            ->first();

        if (! $usuario || ! Hash::check($request->password, $usuario->password)) {
            return response()->json([
                'message' => 'Usuario o contraseña incorrectos.'
            ], 401);
        }

        $token = $usuario->createToken('sigma-mobile')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $usuario,
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada correctamente.'
        ], 200);
    }
}