<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}
