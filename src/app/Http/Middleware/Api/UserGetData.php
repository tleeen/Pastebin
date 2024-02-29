<?php

namespace App\Http\Middleware\Api;

use App\Exceptions\ForbiddenAccessException;
use App\Models\User;
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
        /** @var User $user */
        $user = auth('api')->user();

        if($user->id !== (int)$request->route('id')){
            throw new ForbiddenAccessException( );
        }

        return $next($request);
    }
}
