<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProfileLurahController extends Controller
{
    public function index(){
        $Users = User::orderBy('created_at','ASC')
        ->get();
        return view('lurah.profile.update', compact('Users'));
    }

    public function updateprofile(Request $request)
    {

        $lurah_id = Auth::user()->id;
        $lurah = User::findOrFail($lurah_id);
        $lurah->name = $request->input('name');
        $lurah->email = $request->input('email');
        $lurah->no_ktp = $request->input('no_ktp');
        $lurah->jenis_kelamin = $request->input('jenis_kelamin');
        $lurah->tempat_tanggal_lahir = $request->input('tempat_tanggal_lahir');
        $lurah->no_tlp = $request->input('no_tlp');
        $lurah->alamat = $request->input('alamat');
        $lurah->nip = $request->input('nip');
        $lurah->save();
        return redirect()->route('profilelurah.index')
            ->with('success', 'Data Berhasil Diupdate');
    }
}
