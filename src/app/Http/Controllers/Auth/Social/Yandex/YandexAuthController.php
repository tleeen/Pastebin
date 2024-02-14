<?php

namespace App\Http\Controllers\Auth\Social\Yandex;

use App\DTO\Factories\SocialUserDTOFactory;
use App\Http\Controllers\Controller;
use App\Services\SocialService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class YandexAuthController extends Controller
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
        return Socialite::driver('yandex')->redirect();
    }

    /**
     * @return RedirectResponse
     */
    public function login(): RedirectResponse
    {
        $user = $this->service->saveUser(SocialUserDTOFactory::fromSocialUser(Socialite::driver('yandex')->user()));

        Auth::login($user);

        return redirect()->route('posts.all');
    }
}
