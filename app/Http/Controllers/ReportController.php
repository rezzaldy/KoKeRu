<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class   ReportController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cs = DB::table('cs')
        ->join('distribusi', 'cs.id_cs', '=', 'distribusi.id_cs')
        ->join('ruang', 'ruang.id_ruangan', '=', 'distribusi.id_ruang')
        ->get();
        return view('pages.report', ['cs' => $cs]);
    }
}