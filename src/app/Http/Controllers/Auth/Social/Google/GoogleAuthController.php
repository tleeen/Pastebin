<?php

namespace App\Http\Controllers\Auth\Social\Google;

use App\DTO\Factories\SocialUserDTOFactory;
use App\Http\Controllers\Controller;
use App\Services\interfaces\SocialServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * @param SocialServiceInterface $service
     */
    public function __construct(private readonly SocialServiceInterface $service)
    {
    }

    /**
     * @return RedirectResponse
     */
    public function showLoginForm(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * @return RedirectResponse
     */
    public function login(): RedirectResponse
    {
        $user = $this
            ->service
            ->login(SocialUserDTOFactory::fromArray(['login' => Socialite::driver('google')
                ->user()
                ->getName()]));
        Auth::login($user);

        return redirect()->route('posts.all');
    }
}
