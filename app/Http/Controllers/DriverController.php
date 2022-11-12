<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function index() {
        $count      =   DB::table('data_driver')->count();
        $data       =   Driver::all();
        return view('dashboard.driver', compact('data', 'count'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $driver = Driver::create([
            'name' => $request->nama
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Driver berhasil ditambahkan!',
            'data'    => $driver
        ]);
    }
}
