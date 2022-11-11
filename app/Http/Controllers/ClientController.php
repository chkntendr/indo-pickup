<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index() {
        $count      = DB::table('data_client')->count();
        $data       = DB::table('data_client')->get();
        return view('dashboard.client', compact('data', 'count'));
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'kode'      => 'required',
            'nama'      => 'required',
        ]);

        // Check
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create post
        $client = Client::create([
            'kode_client'   => $request->kode,
            'client'        => $request->nama,
            
        ]);

        // Return response
        return response()->json([
            'success'   => true,
            'message'   => 'Data Berhasil Disimpan!',
            'data'      => $client
        ]);
    }

    public function delete($id) {
        $client = Client::where('id', $id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => "Data berhasil dihapus!"
        ]);
    }
}
