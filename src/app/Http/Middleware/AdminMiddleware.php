<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use TCG\Voyager\Models\Role;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User|null $user */
        $user = auth()->user();

        if($user){

            /** @var Role $role */
            $role = $user->role;

            if($role->name === 'admin'){
                return redirect('/admin');
            }
        }

        return $next($request);
    }
}
