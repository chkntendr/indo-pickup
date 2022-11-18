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
    public function index() {
        $tipe   = DB::table('tipe_barang')->get();
        $client = Client::all();
        $count  = Pickup::count();
        $data   = Pickup::paginate(20);
        $berat  = Pickup::sum('berat');
        $jumlah = Pickup::sum('jumlah');
        $driver = Driver::all();
        return view('dashboard.home', compact('data', 'count', 'berat', 'tipe', 'client', 'jumlah', 'driver'));
    }

    public function store(Request $request) {
        // Create post
        $pickup  = new Pickup;
        $pickup->tipe       = $request->tipe;
        $pickup->client     = $request->client;
        $pickup->luar_kota  = $request->lk;
        $pickup->dalam_kota = $request->dk;
        $pickup->jumlah     = $pickup->luar_kota + $pickup->dalam_kota;
        $pickup->berat      = $request->berat;
        $pickup->tanggal    = $request->tanggal;
        $pickup->driver     = $request->driver;
        $pickup->save();
        return redirect()->to('home');
    }

    public function delete($id) {
        Pickup::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => "Data berhasil dihapus!"
        ]);
    }

    public function deleteMutliple($id) {
        $pickup = Pickup::whereIn('id', $id);

        return response()->json([
            'data' => $pickup
        ]);
    }

    public function export() {
        return Excel::download(new PickupExport, 'data_pickup.xlsx');
    }

    public function import(Request $request) {
        request()->validate([
            'file'  => 'required|mimes:xlsx,xls,csv|max:2048'
        ]);

        if ($files  = $request->file('file')) {
            $import = new ImportPickup;
            $import->setStartRow(2);
            Excel::import ($import, $request->file('file')->store('files'));

            return redirect()->back()->with('success', 'Import Berhasil!');
        }
    }

    public function search(Request $request) {
        $keyword= $request->search;
        $tipe   = DB::table('tipe_barang')->get();
        $client = Client::all();
        $berat  = Pickup::sum('berat');
        $jumlah = Pickup::sum('jumlah');
        $driver = Driver::all();

        $pickup = Pickup::where('driver', 'LIKE', "%".$keyword."%")->paginate();

        return view('dashboard.search', ['pickup' => $pickup, 'tipe' => $tipe, 'client' => $client, 'berat' => $berat, 'jumlah' => $jumlah, 'driver' => $driver]);
    }
}
