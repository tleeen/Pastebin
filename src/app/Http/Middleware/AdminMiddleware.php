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
     * @throws ForbiddenAccessException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()){
            if(auth()->user()->role->name === 'admin'){
                throw new ForbiddenAccessException(403, 'This action is not available to you');
            }
        }

        return $next($request);
    }
}
