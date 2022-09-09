<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class followUpForms extends Controller
{
    public function showNewForm(Request $request){
        // dd("route working");
        return view('dashboard.user.userFollowUpForm');
    }
    
    public function updateForm(Request $request){
        dd("Update route working");
        
    }
}
