<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ApiKey; // Assurez-vous d'avoir un modèle ApiKey correspondant à votre structure de base de données.

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('X-API-KEY'); // Ou $request->get('api_key') si la clé est dans le corps de la requête.

        if (!$apiKey) {
            return response()->json(['error' => 'API Key is required'], 401);
        }

        $apiKeyExists = ApiKey::where('key', $apiKey)->exists();

        if (!$apiKeyExists) {
            return response()->json(['error' => 'Invalid API Key'], 401);
        }

        return $next($request);
    }
}
