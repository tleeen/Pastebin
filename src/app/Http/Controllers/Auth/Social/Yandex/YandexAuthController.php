<?php

namespace App\Http\Controllers\Auth\Social\Yandex;

use App\DTO\Factories\SocialUserDTOFactory;
use App\Http\Controllers\Controller;
use App\Services\interfaces\SocialServiceInterface;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class YandexAuthController extends Controller
{
    /**
     * @param SocialServiceInterface $service
     */
    public function __construct(private readonly SocialServiceInterface $service){}

    /**
     * @return RedirectResponse
     */
    public function showLoginForm(): RedirectResponse
    {
        return Socialite::driver('yandex')->redirect();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(): \Illuminate\Http\RedirectResponse
    {
        $user = $this
            ->service
            ->login(SocialUserDTOFactory::fromArray(['email' => Socialite::driver('yandex')
                ->user()
                ->getEmail()]));
        Auth::login($user);

        return redirect()->route('pastes.index');
    }
}
