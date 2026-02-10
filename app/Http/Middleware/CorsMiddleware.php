<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Obtener el origen de la petición
        $origin = $request->headers->get('Origin');

        // Lista de orígenes permitidos
        $allowedOrigins = [
            'http://localhost:4200',
            'porfolio-frontend-eight.vercel.app'
        ];

        // Permitir cualquier subdominio de vercel.app
        if ($origin && (
            str_ends_with($origin, '.vercel.app') ||
            in_array($origin, $allowedOrigins)
        )) {
            $allowedOrigin = $origin;
        } else {
            $allowedOrigin = 'http://localhost:4200';
        }

        if ($request->isMethod('OPTIONS')) {
            return response()->json([], 200, [
                'Access-Control-Allow-Origin' => $allowedOrigin,
                'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, PATCH, OPTIONS',
                'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With, Accept',
                'Access-Control-Max-Age' => '3600',
            ]);
        }

        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Origin', $allowedOrigin);
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, Accept');

        return $response;
    }
}
