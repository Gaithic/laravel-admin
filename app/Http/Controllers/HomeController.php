<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function mainIndex(){
        return view('users.mainDashboard');
    }



    public function foregotPasswordView(){
        return view('user.user.changepassword')->with('success', "Welcome to Change Your Password!");
    }
}
