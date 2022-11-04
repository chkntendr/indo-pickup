<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $count      = DB::table('data_client')->count();
        $data       = DB::table('data_client')->get();
        return view('dashboard.client', compact('data', 'count'));
    }

    public function new_form() {
        return view('create.client');
    }

    public function create(Request $request) {
        DB::table('data_client')->insert([
            'kode_client' => $request->kode,
            'client' => $request->client,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $count      = DB::table('data_client')->count();
        $data       = DB::table('data_client')->get();
        return view('dashboard.client', compact('data', 'count'));
    }
}
