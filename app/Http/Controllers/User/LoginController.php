<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\AttemptRequest;
use App\Services\ExternalAuthentication\ExternalAuthenticationService;
use App\Services\User\LoginService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

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
        return app(ExternalAuthenticationService::class)->redirectToLinkedin();
    }

    public function socialCallback(Request $request)
    {
        $user = app(ExternalAuthenticationService::class)->user($request->origin);

        if (!$user) {
            return redirect('/')->withErrors("Failed to login with {$request->origin}. Please try again.");
        }

        $user = app(UserService::class)->sync($user, $request->origin);

        $this->service->login($user);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        $this->service->logout();

        return redirect()->route('login');
    }

    public function attempt(AttemptRequest $request)
    {
        $auth = $this->service->attempt($request->only('email', 'password'));

        if ($auth) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->withErrors('Invalid credentials')->withInput();
    }
}
