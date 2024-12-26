<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\DashboardService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $service;

    function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request){

        $linkedinApiResponse = $this->service->getLinkedinProfile(Auth::user());

        $data = [
            'linkedinApiResponse' => $linkedinApiResponse,
            'user' => Auth::user()
        ];

        return view('dashboard.index', $data);
    }
}
