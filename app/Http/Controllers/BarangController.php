<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index() {
        $count  =   DB::table('tipe_barang')->count();
        $data   =   DB::table('tipe_barang')->get();
        return view('dashboard.barang', compact('count', 'data'));
    }

    public function new_form() {
        return view('create.barang');
    }

    public function create(Request $request) {
        DB::table('tipe_barang')->insert([
            'barang' => $request->tipe,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return Redirect::to('barang')->with('message', 'Data added');
    }

    public function delete($id) {
        DB::table('tipe_barang')->where('id', $id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Barang berhasil dihapus!'
        ]);
    }
}
