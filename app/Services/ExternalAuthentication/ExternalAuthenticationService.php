<?php

namespace App\Services\ExternalAuthentication;

use App\Enums\User\UserOriginEnum;
use Laravel\Socialite\Facades\Socialite;


class ExternalAuthenticationService
{

    public function redirectToLinkedin() : \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver(UserOriginEnum::LINKEDIN->value)->redirect();
    }

    public function user(string $origin, string | null $token = null) : \Laravel\Socialite\Contracts\User
    {
        if($token){
            return Socialite::driver($origin)->userFromToken($token);
        }

        return Socialite::driver($origin)->user();
    }


}
