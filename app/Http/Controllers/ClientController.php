<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index() {
        $data       = Client::paginate(20);
        return view('users.client', compact('data'));
    }

    public function create(Request $request) {
        // Create post
        $client = new Client;
        $client->kode_client    = $request->kode_client;
        $client->client         = $request->client;
        
        $client->save();

        return redirect('client');
    }

    public function delete($id) {
        $client = Client::where('id', $id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => "Data berhasil dihapus!"
        ]);
    }
}
