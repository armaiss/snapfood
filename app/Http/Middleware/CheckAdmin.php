<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth::user(); // توجه: از Auth::user() به جای Illuminate\Support\Facades\Auth::user استفاده می‌کنیم.
        if ($user && $user->role == 'admin'){
            return $next($request);
        } else {
            abort(403);
        }
    }
}
