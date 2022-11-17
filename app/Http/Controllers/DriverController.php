<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function index() {
        $data       =   Driver::paginate();
        return view('personel.driver', compact('data'));
    }

    public function store(Request $request) {
        $driver = Driver::create([
            'name' => $request->nama
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Driver berhasil ditambahkan!',
            'data'    => $driver
        ]);
    }

    public function search(Request $request) {
        $keyword = $request->search;

        $search     = Driver::where('name', 'LIKE', '%'.$keyword.'%')->paginate();
        return view('personel.search', compact('search'));
    }

    public function destroy($id) {
        Driver::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => "Data berhasil dihapus!"
        ]);
    }
}
