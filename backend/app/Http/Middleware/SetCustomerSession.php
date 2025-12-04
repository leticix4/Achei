<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetCustomerSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar se existe cookie IS_CUSTOMER
        if ($request->hasCookie('IS_CUSTOMER')) {
            $isCustomer = $request->cookie('IS_CUSTOMER') === 'true';
            session(['is_customer' => $isCustomer]);
        } elseif ($request->hasHeader('X-IS-CUSTOMER')) {
            // Também aceitar via header para flexibilidade
            $isCustomer = $request->header('X-IS-CUSTOMER') === 'true';
            session(['is_customer' => $isCustomer]);
        }

        return $next($request);
    }
}
