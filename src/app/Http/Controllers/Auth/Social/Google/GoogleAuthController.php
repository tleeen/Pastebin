<?php

namespace App\Http\Controllers\Auth\Social\Google;

use App\DTO\Factories\SocialUserDTOFactory;
use App\Http\Controllers\Controller;
use App\Services\SocialService;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function __construct(protected SocialService $service){}

    public function showLoginForm(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function login()
    {
        $user = Socialite::driver('google')->user();

        $this->service->saveUser(SocialUserDTOFactory::fromSocialUser($user));

        return redirect()->route('home');
    }
}
