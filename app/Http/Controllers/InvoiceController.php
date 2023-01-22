<?php

namespace App\Http\Controllers;

use App\Models\Manifest;
use App\Models\ManifestData;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Pickup;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Imports\InvoiceImport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use DataTables;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoice.invoice');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if ($request->ajax()) {
            $invoice = new Invoice;
            $invoice->mnf_id = $request->id;

            return response()->json([
                'status'    => 200,
                'data'      => $invoice
            ]);
        }
    }

    // import function
    public function import(Request $request) {
        request()->validate([
            'file' => 'required|mimes:xlsx, xls, csv|max:2048'
        ]);

        if($files = $request->file('file')) {
            $import = new InvoiceImport($request->id_pickup);
            $upload = Excel::import($import, $request->file('file')->store('files'));

            return response()->json([
                'status'    => 200,
                'message'   => 'Data berhasil diimport!',
            ]);
        }
    }

    public function show($id, Request $request) {
        if ($request->ajax()) {
            $data = Invoice::where('mnf_id', $id)->get();

            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('process', function($data) {
                                $processBtn = '<a id="btn-edit-resi" type="button" data-remote="'.$data->id.'" class="edit ri-edit-box-line" style="color: orange"></a>
                                               <a id="btn-delete-resi" type="button" data-remote="'.$data->id.'" class="delete ri-delete-bin-5-line" style="color: red"></a>';
                                return $processBtn;
                            })
                            ->rawColumns(['process'])
                            ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice, Request $request, $id) {
        if ($request->ajax()) {
            $invoice = Invoice::find($id);

            return response()->json([
                "status"    => 200,
                "data"      => $invoice
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice) {
        //
    }

    public function save($id, Request $request) {
        $invoice = Invoice::find($id);
        $invoice->tujuan            = $request->tujuan;
        $invoice->barcode           = $request->resi;
        $invoice->koli              = $request->koli;
        $invoice->berat             = $request->berat;
        $invoice->harga             = $request->harga;
        $invoice->packing           = $request->packing;
        $invoice->total_kiriman     = $request->total;
        $invoice->keterangan        = $request->keterangan;
        $invoice->save();

        return response()->json([
            "status"    => 200,
            "data"      => $invoice
        ]);
    }

    public function sumTotal() {
        $invoice = Invoice::where('is_added', true)->sum('total_kiriman');

        return response()->json([
            "status"    => 200,
            "data"      => $invoice
        ]);
    }

    public function cekAdded(Request $request) {
        if($request->ajax()) {
            $data = Manifest::latest()->get();

            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($data){
                                $actionBtn = '
                                <a id="btn-detail-pickup" data-remote="'.$data->id.'" type="button" class="detail ri-search-line"></a>
                                <a id="btn-edit-pickup" data-remote="/home/edit/'.$data->id.'" type="button" class="edit ri-edit-box-line" style="color: orange"></a>
                                <a type="button" id="btn-invoice-done" onclick="invoiceDone()" data-remote="'.$data->id.'" style="color: green" class="ri-exchange-funds-fill"></a>';

                                return $actionBtn;
                            })
                            ->rawColumns(['action', 'date_done'])
                            ->make(true);
        }
    }

    public function invoiceMake(Request $request) {
        $id_array   = $request->id;
        $pickup_data    = Pickup::select('id', 'tipe', 'client', 'jumlah', 'berat')
                                ->whereIn('id', $id_array)
                                ->get();

        return response()->json([
            "status"    => 200,
            "data"      => $pickup_data
        ]);
    }

    public function manifestMake(Request $request) {
        $current_date_time = Carbon::now()->toDateTimeString();
        $id = IdGenerator::generate(['table' => 'manifest', 'field' => 'manifest_id', 'length' => 8, 'prefix' => 'MNF-']);
        $id_array     = $request->id;
        $tipe_array   = $request->tipe[0];
        $client_array = $request->client[0];
        
        $manifest               = new Manifest;
        $manifest->manifest_id  = $id;
        $manifest->tipe         = $tipe_array;
        $manifest->client       = $client_array;
        $manifest->done_date    = $current_date_time;
        $manifest->total        = count($id_array);
        $manifest->save();

        return response()->json([
            "status"    => 200,
            "data"      => $manifest
        ]);
    }

    public function createManifestData(Request $request) {
        for ($i=0; $i < count($request->tipe) ; $i++) { 
            $tipe = $request->tipe[$i];
        };

        for ($i=0; $i < count($request->client) ; $i++) {
            $client = $request->client[$i];
        }

        for ($i=0; $i < count($request->jumlah) ; $i++) { 
            $jumlah = $request->jumlah[$i];
        }

        for ($i=0; $i < count($request->berat) ; $i++) { 
            $berat = $request->berat[$i];
        }

        $manifest_id    = $request->id;
        $data = [
            $tipe, $client, $jumlah, $berat, $manifest_id
        ];

        $manifest_data  = new ManifestData;
        $manifest_data->manifest_id = $manifest_id;
        $manifest_data->tipe        = $tipe;
        $manifest_data->client      = $client;
        $manifest_data->jumlah      = $jumlah;
        $manifest_data->berat       = $berat;
        $manifest_data->save();

        return response()->json([
            "status"      => 200,
            "data"        => $manifest_data
        ]);
    }

}
