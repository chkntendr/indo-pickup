<?php

namespace App\Http\Controllers;

use App\Models\Manifest;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Imports\InvoiceImport;
use Maatwebsite\Excel\Facades\Excel;
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
                            ->addColumn('action', function($data) {
                                $actionBtn = '<a id="btn-edit-barInvoice" type="button" data-remote="'.$data->id.'" class="edit ri-edit-box-line" style="color: orange"></a>
                                <a type="button" id="btn-delete-barInvoice" data-remote="/invoice/delete/'.$data->id.'" type="button" style="color: red" class="delete ri-delete-bin-5-line"></a>';
                                return $actionBtn;
                            })
                            ->rawColumns(['action'])
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
        $invoice = Invoice::sum('total_kiriman');

        return response()->json([
            "status"    => 200,
            "data"      => $invoice
        ]);
    }
}
