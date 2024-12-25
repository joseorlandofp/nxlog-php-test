<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    protected $service;

    function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = [];

        return view('user.reset-password.index', $data);
    }
}