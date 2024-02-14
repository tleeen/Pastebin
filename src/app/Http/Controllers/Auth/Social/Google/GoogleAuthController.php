<?php

namespace App\Http\Controllers\Auth\Social\Google;

use App\DTO\Factories\SocialUserDTOFactory;
use App\Http\Controllers\Controller;
use App\Services\SocialService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * @param SocialService $service
     */
    public function __construct(protected SocialService $service){}

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
        $user = $this->service->saveUser(SocialUserDTOFactory::fromSocialUser(Socialite::driver('google')->user()));

        Auth::login($user);

        return redirect()->route('all');
    }
}
