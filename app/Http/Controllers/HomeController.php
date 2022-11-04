<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count  = Pickup::count();
        $pickup = Pickup::all();
        $berat  = Pickup::sum('berat');
        return view('dashboard.home', compact('pickup', 'count', 'berat'));
    }
}
