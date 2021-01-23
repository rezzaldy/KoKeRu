<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $cs = DB::table('cs')
        ->join('distribusi', 'cs.id_cs', '=', 'distribusi.id_cs')
        ->join('ruang', 'ruang.id_ruangan', '=', 'distribusi.id_ruang')
        ->get();
        return view('profile.edit', ['cs' => $cs]);
    }

    public function add(){
        // $distribusi_create = users::all();
        

        $cs = DB::table('cs')
        ->get();
        $ruang = DB::table('ruang')
        ->leftJoin('distribusi', 'ruang.id_ruangan', '=', 'distribusi.id_ruang')
        ->whereNull('id_cs')
        ->get();


        return view('profile.add', ['cs' => $cs, 'ruang' => $ruang]);
    }

    public function change($id){
        // $distribusi_create = users::all();
        
        $ruang = DB::table('ruang')
        ->where('id_ruangan','=',$id)
        ->get();
        $cs = DB::table('cs')
        ->get();
    
        return view('profile.change', ['cs' => $cs, 'ruang' => $ruang]);
    }

    // /**
    //  * Update the profile
    //  *
    //  * @param  \App\Http\Requests\ProfileRequest  $request
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function update(ProfileRequest $request)
    // {
    //     auth()->user()->update($request->all());

    //     return back()->withStatus(__('Profile successfully updated.'));
    // }

    // /**
    //  * Change the password
    //  *
    //  * @param  \App\Http\Requests\PasswordRequest  $request
    //  * @return \Illuminate\Http\RedirectResponse
    //  */
    // public function password(PasswordRequest $request)
    // {
    //     auth()->user()->update(['password' => Hash::make($request->get('password'))]);

    //     return back()->withStatusPassword(__('Password successfully updated.'));
    // }
}
