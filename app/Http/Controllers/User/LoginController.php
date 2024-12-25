<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\LoginService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    protected $service;

    function __construct(LoginService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = [];

        return view('user.login.index', $data);
    }

    public function linkedinRedirect()
    {
        return Socialite::driver('linkedin-openid')->redirect();
    }

    public function socialCallback(Request $request)
    {
        $user = Socialite::driver($request->source)->user();

        dd($user);

        return redirect('/dashboard');
    }
}
