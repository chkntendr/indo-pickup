<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index() {
        $count  =   DB::table('tipe_barang')->count();
        $data   =   Barang::paginate();
        return view('dashboard.barang', compact('count', 'data'));
    }

    public function create(Request $request) {
        $barang = DB::table('tipe_barang')->insert([
                            'barang' => $request->tipe,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);

        // Return response
        return response()->json([
            'success'   => true,
            'message'   => 'Data Berhasil Disimpan!',
            'data'      => $barang
        ]);
    }

    public function delete($id) {
        DB::table('tipe_barang')->where('id', $id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Barang berhasil dihapus!'
        ]);
    }
}
