<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerTaskController extends Controller
{
    public function index(){
        return view('dashboard.manager.ManagerTasks');
        // dd("hello world");
    }
}
