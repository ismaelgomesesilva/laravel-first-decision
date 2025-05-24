<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function gerarToken(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Verifica credenciais
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'data' => null,
                'message' => 'Credenciais inválidas',
                'errors' => ['email' => ['Email ou senha incorretos']],
            ], 401);
        }

        // Usuário autenticado
        $user =   User::where('email', $request->input('email'))->first();

        // Cria o token Sanctum
        $token = $user->createToken('api-token')->plainTextToken;

        // Retorna resposta padronizada
        return response()->json([
            'data' => [
                'user' => $user,
                'token' => $token,
            ],
            'message' => 'Token gerado com sucesso',
            'errors' => null,
        ]);
    }
}
