<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $count_cs = DB::table('cs')->count();
        $count_ruang = DB::table('ruang')->count();
        $count_status = DB::table('distribusi')
            ->where('status', 'belum')
            ->count();
        return view('dashboard', ['cs' => $count_cs, 'ruang' => $count_ruang, 'status' => $count_status]);
    }
}
