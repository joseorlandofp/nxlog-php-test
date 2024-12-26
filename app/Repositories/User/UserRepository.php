<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\AbstractRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UserRepository extends AbstractRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function generatePasswordResetToken(User $user)
    {
        return app(PasswordResetTokenRepository::class)->updateOrCreate([
            'email' => $user->email
        ], [
            'token' => Str::uuid(),
            'email' => $user->email,
            'expires_at' => Carbon::now()->addMinutes(120)->format('Y-m-d H:i:s')
        ]);
    }
}
