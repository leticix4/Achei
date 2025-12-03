<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    public function handle(Request $request, Closure $next, $type): Response
    {
        // 1. Verifica se o usuário está logado
        if (!Auth::check()) {
            return redirect('login');
        }

        // 2. Verifica se o campo 'type' do usuário corresponde ao tipo esperado ('pj')
        if (Auth::user()->type !== $type) {
            // Se o usuário for PF e tentar acessar rotas PJ:
            // Redireciona ou retorna erro 403 (Proibido)
            abort(403, 'Acesso não autorizado. Esta área é exclusiva para Lojistas (PJ).');
        }

        return $next($request);
    }
}