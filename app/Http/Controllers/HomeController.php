<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Models\Client;
use App\Models\Driver;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tipe   = DB::table('tipe_barang')->get();
        $client = Client::all();
        $count  = Pickup::count();
        $pickup = Pickup::all();
        $berat  = Pickup::sum('berat');
        $jumlah = Pickup::sum('jumlah');
        $driver = Driver::all();
        return view('dashboard.home', compact('pickup', 'count', 'berat', 'tipe', 'client', 'jumlah', 'driver'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'tipe'      => 'required',
            'client'    => 'required',
            'jumlah'    => 'required',
            'berat'     => 'required',
            'tanggal'   => 'required',
            'driver'    => 'required',
        ]);

        // Check
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create post
        $pickup = Pickup::create([
            'tipe_id'   => $request->tipe,
            'client_id' => $request->client,
            'jumlah'    => $request->jumlah,
            'berat'     => $request->berat,
            'tanggal'   => $request->tanggal,
            'driver_id' => $request->driver
        ]);

        // Return response
        return response()->json([
            'success'   => true,
            'message'   => 'Data Berhasil Disimpan!',
            'data'      => $pickup
        ]);
    }

    public function delete($id) {
        Pickup::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => "Data berhasil dihapus!"
        ]);
    }

    public function searchClient(Request $request) {
        $data = [];

        if($request->has('q')) {
            $search = $request->q;
            $data   = Client::select('id', 'client')
                    ->where('client', 'LIKE', '%$search%')
                    ->get();
        }
        return response()->json($data);
    }

    public function export() {
        
    }

    public function search(Request $request) {
        $key = $request->keyword;

        $pickup = Pickup::all()->where('jumlah', 'LIKE', '%$key%')->get();

        return response()->json($pickup);
    }
}
