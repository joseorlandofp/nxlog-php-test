<?php

namespace App\Http\Controllers\User;

use App\Enums\User\UserOriginEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Services\User\LoginService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $service;

    function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = [];

        return view('user.registration.index', $data);
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->service->sync((object) $request->all(), UserOriginEnum::LOCAL->value);

        app(LoginService::class)->login($user);

        return redirect()->route('dashboard');
    }
}
