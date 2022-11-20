<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Survei;

class ProfilePengawasController extends Controller
{

    public function index(){
        $Users = User::orderBy('created_at','ASC')
        ->get();
        $survei=Survei::all();
        return view('pengawas.profile.update', compact('Users', 'survei'));
    }

    public function updateprofile(Request $request)
    {

        $this->validate($request, [
            'no_ktp' => 'string|max:16|unique:users',
            'no_tlp' => 'string|max:12|unique:users',
            'nip' => 'string|max:18|unique:users'
        ]);

        $pengawas_id = Auth::user()->id;
        $pengawas = User::findOrFail($pengawas_id);
        $pengawas->name = $request->input('name');
        $pengawas->email = $request->input('email');
        $pengawas->no_ktp = $request->input('no_ktp');
        $pengawas->jenis_kelamin = $request->input('jenis_kelamin');
        $pengawas->tempat_tanggal_lahir = $request->input('tempat_tanggal_lahir');
        $pengawas->no_tlp = $request->input('no_tlp');
        $pengawas->alamat = $request->input('alamat');
        $pengawas->nip = $request->input('nip');
        $pengawas->survei_id = $request->survei;
        $pengawas->save();
        return redirect()->route('profilepengawas.index')
            ->with('success', 'Data Berhasil Diupdate');
    }
}
