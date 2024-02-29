<?php

namespace App\Http\Middleware\Api;

use App\Exceptions\ForbiddenAccessException;
use App\Models\User;
use TCG\Voyager\Models\Role;
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
        /** @var User|null $user */
        $user = auth('api')->user();

        if($user){
            /** @var Role $role */
            $role = $user->role;

            if ($role->name !== 'admin'){
                throw new ForbiddenAccessException();
            }
        }
        else{
            throw new ForbiddenAccessException();
        }

        return $next($request);
    }
}
