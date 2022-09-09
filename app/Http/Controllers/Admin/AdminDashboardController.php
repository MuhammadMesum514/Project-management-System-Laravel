<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        return view('dashboard.admin.dashboard');
    } 
    
    public function teams(){
        return view('dashboard.admin.teams');
    }
}
