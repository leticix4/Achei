<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validação (Garante que os dados obrigatórios vieram)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' exige o campo password_confirmation
            'type' => 'required|in:pf,pj', // Garante que é PF ou PJ
        ]);

        // 2. Pega todos os dados do formulário
        $data = $request->all();

        // 3. Criptografa a senha (Segurança Obrigatória)
        $data['password'] = Hash::make($request->password);
        
        // 4. Define papel padrão
        $data['role'] = 'user'; 

        // 5. Ajuste para o Checkbox "Isento" (se não vier marcado, define como false)
        if (!isset($data['state_registration_exempt'])) {
            $data['state_registration_exempt'] = false;
        } else {
             $data['state_registration_exempt'] = true;
        }

        // 6. Salva no Banco de Dados
        User::create($data);

        // 7. Redireciona para a Home com mensagem de sucesso
        return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso! Faça login para continuar.');
    }
}