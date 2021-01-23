<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CetakController extends Controller
{
    public function cetakForm()
    {
        return view('pages.report');    
    }

    // public function index()
    // {
    //     $cs = DB::table('cs')
    //     ->join('distribusi', 'cs.id_cs', '=', 'distribusi.id_cs')
    //     ->join('ruang', 'ruang.id_ruang', '=', 'distribusi.id_ruang')
    //     ->get();
    //     return view('pages.report', ['cs' => $cs]);
    // }
    
    public function cetakPegawaiPertanggal($tglawal, $tglakhir, $status)
    {
        $cs = DB::table('cs')
        ->join('distribusi', 'cs.id_cs', '=', 'distribusi.id_cs')
        ->join('ruang', 'distribusi.id_ruang', '=', 'ruang.id_ruangan')
        ->join('laporan', 'ruang.id_ruangan', '=', 'laporan.id_ruang')
        ->whereBetween('laporan.tanggal',[$tglawal, $tglakhir])
        ->where('laporan.status', 'like', '%'.$status.'%')
        ->get();
        return view('pages.cetak_pdf_tgl', compact('cs'));
        //dd("Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir);
    }
}
