<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index() {
        $count  =   DB::table('tipe_barang')->count();
        $data   =   DB::table('tipe_barang')->get();
        return view('dashboard.barang', compact('count', 'data'));
    }
}
