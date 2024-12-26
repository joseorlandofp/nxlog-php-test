<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Http\Requests\User\SendResetPasswordMailRequest;
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

    public function show(Request $request)
    {
        $user = $this->service->getUserByToken($request->token);

        if (!$user) {
            return redirect()->route('login')->withErrors('Invalid token.');
        }

        $data = [
            'user' => $user,
            'token' => $request->token
        ];

        return view('user.reset-password.show', $data);
    }

    public function sendMail(SendResetPasswordMailRequest $request)
    {
        $this->service->sendResetPasswordMail($request->email);

        return redirect()->route('login')->with('success', 'Reset password link has been sent to your email. Please check your spam folder if you can\'t find it in your inbox.');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $this->service->resetPassword($request->token, $request->password);

        return redirect()->route('login')->with('success', 'Password has been reset successfully.');
    }
}
