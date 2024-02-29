<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Auth\SessionGuard;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);

        /** @var SessionGuard|AuthManager $auth */
        $auth = auth('api');

        if (! $token = (string)$auth->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function user(): JsonResponse
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {

        /** @var SessionGuard|AuthManager $auth */
        $auth = auth('api');

        $auth->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        /** @var User $user */
        $user = auth('api')->user();

        return $this->respondWithToken($user->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => Config::get('jwt.ttl') * 60
        ]);
    }
}
