<?php

namespace App\Http\Middleware\Api;

use App\Exceptions\ForbiddenAccessException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     * @throws ForbiddenAccessException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth('api')->user()){
            throw new ForbiddenAccessException( );
        }
        elseif(auth('api')->user()->role->name !== 'admin'){
            throw new ForbiddenAccessException();
        }

        return $next($request);
    }
}
