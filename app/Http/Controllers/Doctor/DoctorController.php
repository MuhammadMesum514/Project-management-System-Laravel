<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\manager;
use Illuminate\Support\Facades\Auth;

class managerController extends Controller
{
    function create(Request $request){
          //Validate inputs
          $request->validate([
             'name'=>'required',
             'email'=>'required|email|unique:managers,email',
             'hospital'=>'required',
             'password'=>'required|min:5|max:30',
             'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $manager = new manager();
          $manager->name = $request->name;
          $manager->email = $request->email;
          $manager->hospital = $request->hospital;
          $manager->password = \Hash::make($request->password);
          $save = $manager->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully as manager');
          }else{
              return redirect()->back()->with('fail','Something went Wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:managers,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in managers table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('manager')->attempt($creds) ){
            return redirect()->route('manager.home');
        }else{
            return redirect()->route('manager.login')->with('fail','Incorrect Credentials');
        }
    }

    function logout(){
        Auth::guard('manager')->logout();
        return redirect('/');
    }
}
