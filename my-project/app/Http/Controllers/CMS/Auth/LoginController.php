<?php

namespace App\Http\Controllers\CMS\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function LoginScreen(){
        return view('welcome');
    }
}
