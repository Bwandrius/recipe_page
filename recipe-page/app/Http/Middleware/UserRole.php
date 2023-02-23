<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // check if user role is Admin
        if(!$this->isAdmin($request)){
            return redirect()->route('login');
        }

        Log::channel('role_channel')->info('middleware', ['request' => $request->all()]);

        return $next($request);
    }

    private function isAdmin(Request $request):bool
    {
        return $request->user() && $request->user()->role === 'admin';
    }
}
