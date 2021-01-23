<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $cs = DB::table('cs')
        ->join('distribusi', 'cs.id_cs', '=', 'distribusi.id_cs')
        ->join('ruang', 'ruang.id_ruangan', '=', 'distribusi.id_ruang')
        ->get();
        return view('pages.monitor', ['cs' => $cs]);
    }
}
