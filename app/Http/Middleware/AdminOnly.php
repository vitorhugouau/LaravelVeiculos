<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Acesso restrito. Faça login para continuar.');
        }

        // Verifica se o usuário tem permissão de administrador
        $user = auth()->user();
        
        if (!$user->is_admin) {
            // Redireciona para home com mensagem de erro
            return redirect()->route('home')
                ->with('error', 'Você não tem permissão para acessar a área administrativa.');
        }

        return $next($request);
    }
}