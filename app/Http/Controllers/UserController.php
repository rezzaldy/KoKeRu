<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\distribusi;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $cs = DB::table('cs')
        ->join('distribusi', 'cs.id_cs', '=', 'distribusi.id_cs')
        ->join('ruang', 'ruang.id_ruangan', '=', 'distribusi.id_ruang')
        ->where('distribusi.id_cs', auth()->user()->id)
        ->get();
        return view('pages.cs', ['cs' => $cs]);
    }

    public function deleteDistribusi($id){
        $cs= DB::table('distribusi')->where('id',$id);
        $cs->delete();
        // return redirect()->back()->with('deleteDistribusi','.');
        return redirect('/distribusi')->with('success', 'Data Deleted!');
    }

    public function landing()
    {
        $cs = DB::table('cs')
        ->join('distribusi', 'cs.id_cs', '=', 'distribusi.id_cs')
        ->join('ruang', 'ruang.id_ruangan', '=', 'distribusi.id_ruang')
        ->get();
        return view('welcome', ['cs' => $cs]);
    }

    public function store(Request $request)
    {
        if(isset($_POST["submit"])){
            $a = $request->bukti1;
            if($a != NULL){
                $bukti1 = file_get_contents($a);
                $blob1 = $bukti1;
            }
            else{
                $blob1 = NULL;
            }
            $a = $request->bukti2;
            if($a != NULL){
                $bukti2 = file_get_contents($a);
                $blob2 = $bukti2;
            }
            else{
                $blob2 = NULL;
            }
            $a = $request->bukti3;
            if($a != NULL){
                $bukti3 = file_get_contents($a);
                $blob3 = $bukti3;
            }
            else{
                $blob3 = NULL;
            }
            $a = $request->bukti4;
            if($a != NULL){
                $bukti4 = file_get_contents($a);
                $blob4 = $bukti4;
            }
            else{
                $blob4 = NULL;
            }
            $a = $request->bukti5;
            if($a != NULL){
                $bukti5 = file_get_contents($a);
                $blob5 = $bukti5;
            }
            else{
                $blob5 = NULL;
            }

            $cs = DB::table('distribusi')
            ->where('id_ruang','=', $request->id_ruangan)
            ->update([
                    'bukti1' => $blob1,
                    'bukti2' => $blob2,
                    'bukti3' => $blob3,
                    'bukti4' => $blob4,
                    'bukti5' => $blob5,
                    'status' => 'sudah'
                ]);
            return redirect('/cs');
        }
    }
}