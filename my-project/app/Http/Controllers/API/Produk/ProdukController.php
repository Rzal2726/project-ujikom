<?php

namespace App\Http\Controllers\API\Produk;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function getData(){
        $data = Barang::paginate(10);
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => $data
        ], 200);
    }

    public function searchData(Request $request){
        $data = Barang::orderBy('id','asc');
        if($request->has('search')){
            $data->where('nama_barang','like','%'.$request->search.'%')
            ->orWhere('stok','like','%'.$request->search.'%')
            ->orWhere('harga','like','%'.$request->search.'%')
            ->orWhere('kategori','like','%'.$request->search.'%');
        }
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => $data->paginate(10)
        ], 200);
    }

    public function addData(Request $request){
        $data = Barang::create([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
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
        $data = Barang::where('id','=',$id)->first();

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
        $data = Barang::where('id','=',$id)->update([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
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
        $data = Barang::where('id','=',$id)->delete();
        if(!$data){
            return response()->json([
                'message' => 'gagal menghapus data',
            ], 400);
        }
        return response()->json([
            'message' => 'berhasil menghapus data',
        ], 200);
    }

    public function updateStok(Request $request){
        $cart = $request->cart;

        foreach ($cart as $id => $item) {
            $produk = Barang::find($id);
            if ($produk && $produk->stok >= $item['qty']) {
                $produk->stok -= $item['qty'];
                $produk->save();
            }
        }

        return response()->json(['message' => 'Stok Updated']);

    }
}
