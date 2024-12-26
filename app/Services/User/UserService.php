<?php

namespace App\Services\User;

use App\Enums\User\UserOriginEnum;
use App\Mail\User\ResetPasswordMail;
use App\Models\User;
use App\Repositories\User\PasswordResetTokenRepository;
use App\Repositories\User\UserRepository;
use App\Services\ExternalAuthentication\ExternalAuthenticationService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function sync($user, $origin): User
    {
        $this->repository->updateOrCreate([
            'email' => $user->email
        ], [
            'email' => $user->email,
            'origin' => $origin,
            'name' => $user->name,
            'password' => $user->password ? Hash::make($user->password) : null,
        ]);

        $userEntity = $this->repository->findOneWhere([
            'email' => $user->email
        ]);

        if ($origin === UserOriginEnum::LOCAL->value) {
            return $userEntity;
        }

        $userEntity->externalAuthentications()->updateOrCreate([
            'origin' => $origin
        ], [
            'external_id' => $user->id,
            'origin' => $origin,
            'user_id' => $userEntity->id,
            'token' => $user->token,
            'refresh_token' => $user->refreshToken,
            'expires_at' => Carbon::now()->addSeconds($user->expiresIn),
            'expires_in' => $user->expiresIn,
        ]);

        return $userEntity;
    }

    public function generatePasswordResetToken(User $user): string | null
    {
        $token = $this->repository->generatePasswordResetToken($user);

        return $token;
    }

    public function invalidatePasswordResetToken(string $email): void
    {
        app(PasswordResetTokenRepository::class)->invalidate([
            'email' => $email
        ]);
    }

    public function getLinkedinProfile($user): \Laravel\Socialite\Contracts\User | null
    {
        if ($user->origin !== UserOriginEnum::LINKEDIN->value) {
            return null;
        }

        return app(ExternalAuthenticationService::class)->user(UserOriginEnum::LINKEDIN->value, $user->externalAuthentications
            ->where('origin', UserOriginEnum::LINKEDIN->value)
            ->first()->token);
    }

    public function resetPassword($token, $password): User | null
    {
        $user = $this->getUserByToken($token);

        if (!$user) {
            return null;
        }

        $this->repository->update($user, [
            'password' => Hash::make($password),
            'origin' => UserOriginEnum::LOCAL->value
        ]);

        $this->invalidatePasswordResetToken($user->email);

        return $user;
    }

    public function getUserByToken($token): User | null
    {
        $token = app(PasswordResetTokenRepository::class)->findOneWhere([
            'token' => $token
        ]);

        if (!$token || Carbon::now()->isAfter(Carbon::parse($token->expires_at))) {
            return null;
        }

        return $this->repository->findOneWhere([
            'email' => $token?->email
        ]);
    }

    public function sendResetPasswordMail($email): void
    {
        $user = $this->repository->findOneWhere([
            'email' => $email
        ]);

        $token = $this->generatePasswordResetToken($user);

        Mail::to($email)->send(new ResetPasswordMail($user, $token));
    }
}
