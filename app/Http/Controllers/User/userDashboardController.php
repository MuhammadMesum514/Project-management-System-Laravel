<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userDashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.user.dashboard');
    }
}
