<?php

namespace App\Http\Controllers\Auth\Social\Google;

use App\DTO\Factories\SocialUserDTOFactory;
use App\Http\Controllers\Controller;
use App\Services\SocialService;
use Illuminate\Http\RedirectResponse;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> dd45e6571d4dc077fd49887c58fe1d89052d3bb3
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
<<<<<<< HEAD
        $user = $this->service->saveUser(SocialUserDTOFactory::fromSocialUser(Socialite::driver('google')->user()));

        Auth::login($user);

        return redirect()->route('all');
=======
        $user = Socialite::driver('google')->user();

        $this->service->saveUser(SocialUserDTOFactory::fromSocialUser($user));

        return redirect()->route('home');
>>>>>>> dd45e6571d4dc077fd49887c58fe1d89052d3bb3
    }
}
