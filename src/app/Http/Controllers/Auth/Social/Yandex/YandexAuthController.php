<?php

namespace App\Http\Controllers\Auth\Social\Yandex;

use App\DTO\Factories\SocialUserDTOFactory;
use App\Http\Controllers\Controller;
use App\Services\SocialService;
use Illuminate\Http\RedirectResponse;
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
        $user = Socialite::driver('yandex')->user();

        $this->service->saveUser(SocialUserDTOFactory::fromSocialUser($user));

<<<<<<< HEAD
        return redirect()->route('all');
=======
        return redirect()->route('home');
>>>>>>> dd45e6571d4dc077fd49887c58fe1d89052d3bb3
    }
}
