<?php

namespace App\Http\Controllers\CMS\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function HomeScreen(){
        return view('body.home')->with('isHome',true);
    }
    public function LoginScreen(){
        return view('login-page');
    }
}
