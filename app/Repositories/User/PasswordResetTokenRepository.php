<?php

namespace App\Repositories\User;

use App\Models\PasswordResetToken;
use App\Repositories\AbstractRepository;


class PasswordResetTokenRepository extends AbstractRepository
{
    public function __construct(PasswordResetToken $model)
    {
        $this->model = $model;
    }

    public function invalidate($email)
    {
        $this->model->where('email', $email)->delete();
    }

}
