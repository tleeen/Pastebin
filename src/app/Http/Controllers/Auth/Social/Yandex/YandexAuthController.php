<?php

namespace App\Http\Controllers\Auth\Social\Yandex;

use App\DTO\Factories\SocialUserDTOFactory;
use App\Http\Controllers\Controller;
use App\Services\SocialService;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class YandexAuthController extends Controller
{
    public function __construct(protected SocialService $service){}
    public function showLoginForm(): RedirectResponse
    {
        return Socialite::driver('yandex')->redirect();
    }

    public function login()
    {
        $user = Socialite::driver('yandex')->user();

        $this->service->saveUser(SocialUserDTOFactory::fromSocialUser($user));

        return redirect()->route('home');
    }
}
