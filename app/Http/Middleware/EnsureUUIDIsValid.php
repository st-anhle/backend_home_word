<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUUIDIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uuid = $request->uuid;
        if ($uuid == null) {
            return response('Valid UUID.', 401);
        }
        if (User::where('uuid', $uuid)->first()) {
            return $next($request);
        }
        return response('Wrong UUID.', 401);
    }
}
