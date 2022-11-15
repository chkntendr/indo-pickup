<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Models\Client;
use App\Models\Driver;
use App\Imports\ImportPickup;
use App\Exports\PickupExport;

use Maatwebsite\Excel\Facades\Excel;
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
        $data   = Pickup::paginate(100);
        $berat  = Pickup::sum('berat');
        $jumlah = Pickup::sum('jumlah');
        $driver = Driver::all();
        return view('dashboard.home', compact('data', 'count', 'berat', 'tipe', 'client', 'jumlah', 'driver'));
    }

    public function fetch_data(Request $request) {
        if ($request->ajax()) {
            $data = Pickup::paginate(10);

            return view('includes.pagination_data', compact('data'))->render();
        }
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

    public function edit($id) {
        $pickup = Pickup::find($id);

        return response()->json($pickup);
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
        return Excel::download(new PickupExport, 'data_pickup.xlsx');
    }

    public function import(Request $request) {
        request()->validate([
            'file'  => 'required|mimes:xlsx,xls,csv|max:2048'
        ]);

        if ($files = $request->file('file')) {
            $import = new ImportPickup;
            $import->setStartRow(2);
            Excel::import ($import, $request->file('file')->store('files'));

            return redirect()->back()->with('success', 'Import Berhasil!');
        }
    }

    public function search(Request $request) {
        $pickups = Pickup::all();

        if ($request->keyword != ''){
            $pickups = Pickup::with(['Driver' => function ($query) {
                $query->where('name','LIKE','%'.$request->keyword.'%');
            }])->get()->load('client', 'tipe', 'driver');

            // $pickups = Pickup::with('driver')->where('name','LIKE','%'.$request->keyword.'%')->get()->load('client', 'tipe', 'driver');

            return response()->json([
                'pickups' => $pickups
            ]);
        }        
      }
}
