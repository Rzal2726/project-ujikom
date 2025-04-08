<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Exports\TransaksiExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    public function getData(){
        $data = Transaksi::with(['user', 'pelanggan'])->paginate(10);
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => $data
        ], 200);
    }

    public function searchData(Request $request){
        $data = Transaksi::orderBy('id','asc');
        $search = $request->search;
        if($request->has('search')){
            $data->where(function ($query) use ($search) {
                $query->whereHas('pelanggan', fn($q) => $q->where('nama', 'like', "%$search%"))
                ->orwhere('harga','like','%'.$search.'%')
                ->orWhere('daftar_produk','like','%'.$search.'%')
                ->orWhereRaw("DATE_FORMAT(tanggal, '%d/%m/%Y') LIKE ?", ["%{$search}%"]);
            });
        }
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => $data->with(['user', 'pelanggan'])->paginate(10)
        ], 200);
    }

    public function addData(Request $request){
        $data = Transaksi::create([
            'harga' => $request->harga,
            'daftar_produk' => $request->daftar_produk,
            'tanggal' => $request->tanggal,
            'id_pelanggan' => $request->id_pelanggan,
            'id_admin' => auth()->id(),
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
        $data = Transaksi::where('id','=',$id)->with(['user', 'pelanggan'])->first();

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
        $data = Transaksi::where('id','=',$id)->update([
            'harga' => $request->harga,
            'daftar_produk' => $request->daftar_produk,
            'tanggal' => $request->tanggal,
            'id_pelanggan' => $request->id_pelanggan,
            'id_admin' => auth()->id(),
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
        $data = Transaksi::where('id','=',$id)->delete();
        if(!$data){
            return response()->json([
                'message' => 'gagal menghapus data',
            ], 400);
        }
        return response()->json([
            'message' => 'berhasil menghapus data',
        ], 200);
    }

    public function exportExcel()
    {
        return Excel::download(new TransaksiExcelExport, 'data-transaksi.xlsx');
    }
}
