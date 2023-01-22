<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Models\Client;
use App\Models\Driver;
use App\Models\Invoice;
use App\Imports\ImportPickup;
use App\Exports\PickupExport;
use DataTables;

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
        return view('dashboard.home');
    }

    public function getTujuan(Request $request) {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data   = Pickup::select("tujuan")
            		->where('tujuan','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }

    public function show($id) {
        $pickup = Pickup::where('id', $id)->get();

        return response()->json([
            'status'    => 200,
            'message'   => 'Detail',
            'data'      => $pickup
        ]);
    }

    public function getKargo(Request $request) {
        if ($request->ajax()) {
            $data       = Pickup::latest()->where('tipe', "Kargo")->get();
            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($data){
                                $actionBtn = '
                                <a id="btn-detail-pickup" data-remote="'.$data->id.'" type="button" class="detail ri-search-line"></a>
                                <a id="btn-edit-pickup" data-remote="/home/edit/'.$data->id.'" type="button" class="edit ri-edit-box-line" style="color: orange"></a>
                                <a type="button" id="btn-delete-pickup" data-remote="'.$data->id.'" style="color: red" class="delete ri-delete-bin-5-line"></a>';

                                return $actionBtn;
                            })
                            ->addColumn('checkbox', function($data) {
                                if ($data->is_added == true) {
                                    $checkbox = '<input type="checkbox" name="pickup_checkbox[]" disabled class="pickup_checkbox" value="'.$data->id.'" />';
                                    return $checkbox;
                                } else {
                                    $checkbox = '<input type="checkbox" name="pickup_checkbox[]" class="pickup_checkbox" value="'.$data->id.'" />';
                                    return $checkbox;
                                }
                            })
                            ->rawColumns(['action', 'checkbox'])
                            ->make(true);
        }
    }

    public function getDokumen(Request $request) {
        if ($request->ajax()) {
            $data = Pickup::latest()->where('tipe', "Dokumen")->get();

            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($data) {
                                $actionBtn = '
                                <a id="btn-detail-pickup" data-remote="'.$data->id.'" type="button" class="detail ri-search-line"></a>
                                <a id="btn-edit-pickup" data-remote="/home/edit/'.$data->id.'" type="button" class="edit ri-edit-box-line" style="color: orange"></a>
                                <a type="button" id="btn-delete-pickup" data-remote="'.$data->id.'" style="color: red" class="delete ri-delete-bin-5-line"></a>';

                                return $actionBtn;
                            })
                            ->addColumn('checkbox', '<input type="checkbox" name="pickup_checkbox[]" class="pickup_checkbox" value="{{$id}}" />')
                            ->rawColumns(['action', 'checkbox'])
                            ->make(true);
        }
    }

    public function store(Request $request) {
        // Create post
        $pickup = new Pickup;
        $pickup->tipe       = $request->tipe;
        $pickup->client     = $request->client;
        $pickup->tanggal_pic= $request->tanggal_pic;
        $pickup->tanggal    = $request->tanggal;
        $pickup->sp1        = $request->sp1;
        $pickup->sp2        = $request->sp2;
        $pickup->sp3        = $request->sp3;
        $pickup->luar_kota  = $request->lk;
        $pickup->dalam_kota = $request->dk;
        $pickup->jumlah     = $request->jumlah;
        $pickup->koli       = $request->koli;
        $pickup->description= $request->description;
        $pickup->berat      = $request->berat;
        $pickup->driver     = $request->driver;
        $pickup->created_at = \Carbon\Carbon::now(); # new \Datetime()
        $pickup->updated_at = \Carbon\Carbon::now(); # new \Datetime()
        $pickup->save();

        return response()->json([
            'status' => 200,
            'message' => "Berhasil dibuat!",
            'data' => $pickup
            
        ]);
    }

    public function delete($id) {
        Pickup::where('id', $id)->delete();
        Invoice::where('mnf_id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => "Data berhasil dihapus!"
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
            $upload = Excel::import ($import, $request->file('file')->store('files'));

            // return redirect('/home')->with('success', '$url');
            return response()->json([
                'status' => 200,
                'message' => 'Data berhasil di import!',
                'data' => $upload
            ]);
        }
    }

    public function editSave($id, Request $request) {
        $pickup = Pickup::find($id);

        $pickup->tipe       = $request->tipe;
        $pickup->client     = $request->client;
        $pickup->tanggal    = $request->tanggal;
        $pickup->sp1        = $request->sp1;
        $pickup->sp2        = $request->sp2;
        $pickup->sp3        = $request->sp3;
        $pickup->luar_kota  = $request->lk;
        $pickup->dalam_kota = $request->dk;
        $pickup->jumlah     = $request->jumlah;
        $pickup->koli       = $request->koli;
        $pickup->description= $request->description;
        $pickup->berat      = $request->berat;
        $pickup->driver     = $request->driver;
        $pickup->updated_at = \Carbon\Carbon::now(); # new \Datetime()
        $pickup->save();

        return response()->json([
            'success'   => true,
            'message'   => 'Data berhasil diperbaharui!',
            'data'      => $pickup
        ]);
    }

    public function getid() {
        $id = Pickup::select('id')->get();

        return response()->json([
            'data'  => $id
        ]);
    }
}
