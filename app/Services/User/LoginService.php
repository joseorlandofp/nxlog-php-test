<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login($user): void
    {
        Auth::login($user);
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function attempt($credentials): bool
    {
        return Auth::attempt($credentials);
    }
}
