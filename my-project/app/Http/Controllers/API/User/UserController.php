<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\LoginCounter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function getData(){
        $data = User::paginate(10);
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => $data
        ], 200);
    }

    public function searchData(Request $request){
        $data = User::orderBy('id','asc');
        if($request->has('search')){
            $data->where('name','like','%'.$request->search.'%')
            ->orWhere('email','like','%'.$request->search.'%');
        }
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => $data->paginate(10)
        ], 200);
    }

    public function addData(Request $request){
        $password = Hash::make($request->password);
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'level_id' => $request->level,
        ]);
        if(!$data){
            return response()->json([
                'message' => 'gagal menambahkan data',
            ], 400);
        }
        return response()->json([
            'message' => 'berhasil menambahkan data',
        ], 200);
    }

    public function showData($id){
        $data = User::where('id','=',$id)->first();

        if(!$data){
            return response()->json([
                'message' => 'gagal mendapatkan data',
            ], 400);
        }
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => $data
        ], 200);
    }

    public function getProfile(){
        $data = User::where('id','=',auth()->user->id)->first();

        if(!$data){
            return response()->json([
                'message' => 'gagal mendapatkan data',
            ], 400);
        }
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => $data
        ], 200);
    }

    public function editData(Request $request, $id){
        $data = User::where('id','=',$id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'level_id' => $request->level,
        ]);
        if($request->has('password')){
            if(!isEmpty($request->password)){
                $password = Hash::make($request->password);
                $data->update([
                    'password' => $password
                ]);
            }
        }
        if(!$data){
            return response()->json([
                'message' => 'gagal mengubah data',
            ], 400);
        }
        return response()->json([
            'message' => 'berhasil mengubah data',
        ], 200);
    }

    public function deleteData($id){
        $data = User::where('id','=',$id)->delete();
        if(!$data){
            return response()->json([
                'message' => 'gagal menghapus data',
            ], 400);
        }
        return response()->json([
            'message' => 'berhasil menghapus data',
        ], 200);
    }

    public function getLogin(){
        $data = LoginCounter::with('user')->paginate(10);

        if ($data->isEmpty()) {
            return response()->json([
                'message' => 'gagal mendapatkan data',
            ], 404); // Better to use 404 if data not found
        }
    
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => $data,
        ], 200);
    }
}
