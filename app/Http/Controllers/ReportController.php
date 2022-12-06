<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Client;
use App\Models\Pickup;
use Illuminate\Http\Request;
use DataTables;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $client = Client::all();

        return view('report.report', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $client         = $request->client;
        $now            = date("Y-m-d");
        $tanggalMulai   = $request->tanggalMulai;

        $params         = ['client' => $client, 'tanggal' => $tanggalMulai];

        $search = Pickup::where($params)
                        ->orderBy('tanggal')
                        ->get();

        if ($search > "0") {
            return view('report.print', compact('search', 'now', 'client'));
        } else {
            return response()->json([
                'message' => "Data tidak ditemukan",
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show() {
        $dokumen = Pickup::query()->where('tipe_id', '<>', '2')->get();
        $paket   = Pickup::query()->where('tipe_id', '<>', '1')->get();
        $kargo   = Pickup::query()->where('tipe_id', '<>', '3')->get();

        return response()->json($dokumen, $paket, $kargo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report) {
        //
    }

    public function getReport(Request $request) {
        if($request->ajax()) {
            $search = "Bank Syariah Mandiri";
            $client = Client::select('client');
            $data = Pickup::select('client', 'jumlah')->where('client', 'LIKE', "%$search%")->get();

            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($data){
                            $actionBtn = '<a id="btn-edit-pickup" data-remote="/home/edit/'.$data->id.'" type="button" class="edit bi bi-pencil-square" style="color: orange"></a>
                            <a type="button" id="btn-delete-pickup" data-remote="/home/delete/'.$data->id.'" style="color: red" class="delete bi bi-trash"></a>';

                            return $actionBtn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
    }

    public function search(Request $request) {
        $pickups = [];

        if ($request->has('q')) {
            $search     = $request->q;
            $pickups    = Client::select("id", "kode_client", "client")
                        ->Where('kode_client', 'LIKE', "%$search%")
                        ->get();
        }

        return response()->json($pickups);
    }

    public function print(Request $request) {
        $keyword = $request->keyword;

        return response()->json($keyword);
    }
}
