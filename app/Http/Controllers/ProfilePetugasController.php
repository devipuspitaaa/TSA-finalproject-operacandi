<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Survei;

class ProfilePetugasController extends Controller
{

    public function index(){
        $Users = User::orderBy('created_at','ASC')
        ->get();
        $pengawas=User::all()
                -> where('role', 'pengawas');
        return view('petugas.profile.update', compact('Users', 'pengawas'));
    }

    public function updateprofile(Request $request)
    {

        $petugas_id = Auth::user()->id;
        $petugas = User::findOrFail($petugas_id);
        $petugas->name = $request->input('name');
        $petugas->email = $request->input('email');
        $petugas->no_ktp = $request->input('no_ktp');
        $petugas->jenis_kelamin = $request->input('jenis_kelamin');
        $petugas->tempat_tanggal_lahir = $request->input('tempat_tanggal_lahir');
        $petugas->no_tlp = $request->input('no_tlp');
        $petugas->alamat = $request->input('alamat');
        $petugas->nip = $request->input('nip');
        $petugas->pengawas_id = $request->pengawas;
        $petugas->save();
        return redirect()->route('petugas.profile.index')
            ->with('success', 'Data Berhasil Diupdate');
    }
}
