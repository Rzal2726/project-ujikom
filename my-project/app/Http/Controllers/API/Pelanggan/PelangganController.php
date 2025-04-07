<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function getData(){
        $data = Pelanggan::paginate(10);
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => $data
        ], 200);
    }

    public function getAll(){
        $data = Pelanggan::all();
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => $data
        ], 200);
    }

    public function searchData(Request $request){
        $data = Pelanggan::orderBy('id','asc');
        if($request->has('search')){
            $data->where('nama','like','%'.$request->search.'%')
            ->orWhere('alamat','like','%'.$request->search.'%')
            ->orWhere('no_telp','like','%'.$request->search.'%');
        }
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => $data->paginate(10)
        ], 200);
    }

    public function addData(Request $request){
        $data = Pelanggan::create([
            'nama' => $request->name,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
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
        $data = Pelanggan::where('id','=',$id)->first();

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
        $data = Pelanggan::where('id','=',$id)->update([
            'nama' => $request->name,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);
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
        $data = Pelanggan::where('id','=',$id)->delete();
        if(!$data){
            return response()->json([
                'message' => 'gagal menghapus data',
            ], 400);
        }
        return response()->json([
            'message' => 'berhasil menghapus data',
        ], 200);
    }
}
