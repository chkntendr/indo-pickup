<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index() {
        $count      =   DB::table('data_driver')->count();
        $data       =   DB::table('data_driver')->get();
        return view('dashboard.driver', compact('data', 'count'));
    }
}
