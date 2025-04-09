<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginCounter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request){
        $user = $request->user(); // Sanctum auto-detect user by token

        if (!$user) {
            return response()->json([
                'message' => 'Invalid Token or User Not Found'
            ], 400);
        }

        return response()->json([
            'message' => 'Token Valid',
            'user' => $user
        ], 200);
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            LoginCounter::create([
                'id_user' => $user->id,
                'tanggal' => now()->toDateString(),
                'ip' => $request->ip()
            ]);
            return response()->json([
                'message' => 'Berhasil Login',
                'token' => $token
            ], 200);
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return response()->json([
                'message' => 'Email atau Password Salah'
            ], 400);
        }
    }

    public function actionlogout(Request $request)
    {
        $user = $request->user(); // Get user from token
        $user->currentAccessToken()->delete(); // Delete only current token
        return response()->json([
            'message' => 'Berhasil Logout'
        ], 200);
    }

    public function getLevel(){
        return response()->json([
            'data' => auth()->user()->level_id
        ]);
    }
}
