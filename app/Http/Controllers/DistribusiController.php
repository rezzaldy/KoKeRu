<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\distribusi;
class DistribusiController extends Controller
{
    function addData(Request $request)
    {
        $distribusi= new distribusi;
        $distribusi->id_cs=$request->input('id_cs');
        $distribusi->id_ruang=$request->input('id_ruangan');
        $distribusi->status='belum';
        $distribusi->save();
        return redirect('/distribusi')->with('status', 'Data Created!');    
    }


    function changeData(Request $request)
    {
       
        $distribusi = DB::table('distribusi')
        ->where('id_ruang','=', $request->id_ruangan)
        ->update([
            'id_cs' => $request->id_cs
        ]);
        return redirect('/distribusi')->with('success', 'Data Created!');
        // $distribusi= distribusi::Find($request->input('id_ruangan'));
        
        // $distribusi->id_cs=$request->input('id_cs');
        // $distribusi->id_ruang=$request->input('id_ruangan');
        // $distribusi->save();
        // return redirect('/distribusi')->with('success', 'Data Created!');
    }

    function resetStatus(){
        $status = DB::table('distribusi')
        ->update([
            'status'=> 'belum',
            'bukti1'=> NULL,
            'bukti2'=> NULL,
            'bukti3'=> NULL,
            'bukti4'=> NULL,
            'bukti5'=> NULL
        ]);
        return redirect('/monitor');
    }
}
