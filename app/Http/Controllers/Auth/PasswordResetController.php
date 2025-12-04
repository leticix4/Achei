<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    // 1. Mostra o formulário de "Digite seu e-mail"
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    // 2. Envia o e-mail com o link (CORRIGIDO)
    public function sendResetLinkEmail(Request $request)
    {
        // A validação retorna os dados limpos (o email)
        $credentials = $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($credentials);

        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('success', 'Link de redefinição enviado! (Verifique o arquivo storage/logs/laravel.log)');
        }

        return back()->withErrors(['email' => 'Não conseguimos encontrar um usuário com esse endereço de e-mail.']);
    }

    // 3. Mostra o formulário de "Nova Senha"
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password')->with(['token' => $token, 'email' => $request->email]);
    }

    // 4. Salva a nova senha
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('home')->with('success', 'Sua senha foi redefinida com sucesso! Faça login.');
        }

        return back()->withErrors(['email' => 'Ocorreu um erro ao redefinir sua senha. Verifique o e-mail.']);
    }
}