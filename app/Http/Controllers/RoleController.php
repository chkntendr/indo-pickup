<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view ('users.role');
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
        $role = new Role;
        $role->role = $request->role;
        $role->created_at = \Carbon\Carbon::now(); # new \Datetime()
        $role->updated_at = \Carbon\Carbon::now(); # new \Datetime()
        $role->save();

        return response()->json([
            'status' => 200,
            'message' => 'Role added!',
            'data' => $role
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Role::where('id', $id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Role dihapus!'
        ]);
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Role::latest()->get();
            return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($data) {
                                $actionBtn = '
                                <a id="btn-detail-role" data-remote="/roles/detail/'.$data->id.'" type="button" class="detail ri-search-line"></a>
                                <a id="btn-edit-role" data-remote="/roles/edit/'.$data->id.'" type="button" class="edit ri-edit-box-line" style="color: orange"></a>
                                <a type="button" id="btn-delete-role" data-remote="/roles/delete/'.$data->id.'" style="color: red" class="delete ri-delete-bin-5-line"></a>';

                                return $actionBtn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
    }

    public function select2(Request $request) {
        $data = [];

        if($request->has('q')) {
            $search = $request->q;
            $data = Role::select('id', 'role')
                        ->where('role', 'LIKE', "%$search%")
                        ->get();
        }

        return response()->json($data);
    }
}
