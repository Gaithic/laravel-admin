<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function mainIndex(){
        return view('users.mainDashboard');
    }
}
