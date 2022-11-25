<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ClientController extends Controller
{
    public function index() {
        return view('users.client');
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Client::latest()->get();

            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row) {
                                $actionBtn = '<a onclick="editPickup()" type="button" class="edit bi bi-pencil-square" style="color: orange"></a> <a onclick="deletePickup()" type="button" style="color: red" class="delete bi bi-trash"></a>';
                                return $actionBtn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
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
