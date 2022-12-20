<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class DriverController extends Controller
{
    public function index() {
        return view('personel.driver');
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Driver::latest()->get();

            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($data) {
                                $actionBtn = '<a onclick="editPickup()" type="button" class="edit ri-edit-box-line" style="color: orange"></a>
                                <a id="btn-delete-driver" data-remote="/driver/delete/'.$data->id.'" type="button" style="color: red" class="delete ri-delete-bin-5-line"></a>';
                                return $actionBtn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
    }

    public function store(Request $request) {
        $driver = Driver::create([
            'name' => $request->nama,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'status'    => 200,
            'message'   => "Data inserted",
            'data'      => $driver
        ]);
    }

    public function search(Request $request) {
        $keyword = $request->search;

        $search     = Driver::where('name', 'LIKE', '%'.$keyword.'%')->paginate();
        return view('personel.search', compact('search'));
    }

    public function destroy($id) {
        Driver::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => "Data berhasil dihapus!"
        ]);
    }

    public function select2(Request $request) {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data   = Driver::select("id","name")
            		->where('name','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }
}
