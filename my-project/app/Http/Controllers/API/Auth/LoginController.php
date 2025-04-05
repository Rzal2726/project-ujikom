<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request){
        if (Auth::check()) {
            return response()->json([
                'message' => 'berhasil login'
            ], 200);
        }else{
            return response()->json([
                'message' => 'gagal login'
            ], 200);
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return response()->json([
                'message' => 'Berhasil Login'
            ], 200);
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return response()->json([
                'message' => 'Email atau Password Salah'
            ], 400);
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Berhasil Login'
        ], 200);
    }
}
