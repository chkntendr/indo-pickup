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
            $import = new InvoiceImport($request->mnf_id);
            $upload = Excel::import($import, $request->file('file')->store('files'));

            $count = Invoice::where('mnf_id', $request->mnf_id)->count();
            $manifest = Manifest::find($request->mnf_id);
            $manifest->total = $count;
            $manifest->save();

            return response()->json([
                'status'    => 200,
                'message'   => 'Data berhasil diimport!',
                'data'      => $manifest
            ]);
        }
    }

    public function show(Request $request) {
        if ($request->ajax()) {
            $data = Invoice::latest()->get();

            return DataTables::of($data)
                            ->addIndexColumn()
                            // ->addColumn('manifest', function(Invoice $invoice) {
                            //     return $invoice->manifest->map(function($manifest){
                            //         return $invoice;
                            //     })->implode('<br>');
                            // })
                            ->addColumn('action', function($data) {
                                $actionBtn = '<a onclick="editPickup()" type="button" class="edit ri-edit-box-line" style="color: orange"></a>
                                <a type="button" id="btn-delete-barang" data-remote="/invoice/delete/'.$data->id.'" type="button" style="color: red" class="delete ri-delete-bin-5-line"></a>';
                                return $actionBtn;
                            })
                            ->rawColumns(['action', 'manifest'])
                            ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
