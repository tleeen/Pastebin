<?php

namespace App\Http\Middleware\Api;

use App\Exceptions\ForbiddenAccessException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserGetData
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     * @throws ForbiddenAccessException
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth('api')->user()->id != $request->route()->parameter('id')){
            throw new ForbiddenAccessException( );
        }

        return $next($request);
    }
}
