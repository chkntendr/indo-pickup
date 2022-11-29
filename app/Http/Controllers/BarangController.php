<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class BarangController extends Controller
{
    public function index() {
        $count  =   DB::table('tipe_barang')->count();
        $data   =   Barang::paginate();
        return view('dashboard.barang', compact('count', 'data'));
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Barang::latest()->get();

            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($data) {
                                $actionBtn = '<a onclick="editPickup()" type="button" class="edit bi bi-pencil-square" style="color: orange"></a>
                                <a id="btn-delete-barang" data-remote="/barang/delete/'.$data->id.'" type="button" style="color: red" class="delete bi bi-trash"></a>';
                                return $actionBtn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
    }

    public function create(Request $request) {
        $barang = DB::table('tipe_barang')->insert([
                            'barang' => $request->tipe,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);

        // Return response
        return response()->json([
            'success'   => true,
            'message'   => 'Data Berhasil Disimpan!',
            'data'      => $barang
        ]);
    }

    public function delete($id) {
        DB::table('tipe_barang')->where('id', $id)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Barang berhasil dihapus!'
        ]);
    }

    public function select2(Request $request) {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data   = Barang::select("id","barang")
            		->where('barang','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }
}
