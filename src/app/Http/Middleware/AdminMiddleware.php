<?php

namespace App\Http\Middleware;

use App\Exceptions\ForbiddenAccessException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()){
            if(auth()->user()->role->name === 'admin'){
                return redirect('/admin');
            }
        }

        return $next($request);
    }
}
