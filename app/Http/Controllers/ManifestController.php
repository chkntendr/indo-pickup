<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manifest;
use App\Import\ManifestImport;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use DataTables;

class ManifestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $id = IdGenerator::generate(['table' => 'manifest', 'field' => 'm_id', 'length' => 8, 'prefix' => 'MNF-']);

        $manifest = new Manifest();
        $manifest->m_id = $id;
        $manifest->save();

        return redirect('/report');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        if ($request->ajax()) {

            $data = Manifest::latest()->get();
            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($data){
                            $actionBtn = '
                            <a id="btn-manifest-upload" data-remote="'.$data->id.'" type="button" class="detail bi bi-search"></a>
                            <a id="btn-edit-pickup" data-remote="/manifest/edit/'.$data->id.'" type="button" class="edit bi bi-pencil-square" style="color: orange"></a>
                            <a type="button" id="btn-delete-pickup" data-remote="/manifest/delete/'.$data->id.'" style="color: red" class="delete bi bi-trash"></a>';

                            return $actionBtn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upload(Request $request) {
        request()->validate([
            'file'  => 'required|mimes:xlsx,xls,csv|max:2048'
        ]);

        if ($files  = $request->file('file')) {
            $import = new ManifestImport;
            Excel::import ($import, $request->file('file')->store('files'));

            return response()->json([
                'status'    => 200,
                'message'   => 'Data berhasil di upload',
                'data'      => $import
            ]);
        }
    }
}
