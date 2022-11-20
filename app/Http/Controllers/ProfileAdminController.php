<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileAdminController extends Controller
{
    public function index(){
        $Users = User::orderBy('created_at','ASC')
        ->get();
        return view('admin.profile.update', compact('Users'));
    }

    public function updateprofile(Request $request)
    {

        $this->validate($request, [
            'no_ktp' => 'string|max:16|unique:users',
            'no_tlp' => 'string|max:12|unique:users',
            'nip' => 'string|max:18|unique:users'
        ]);

        $admin_id = Auth::user()->id;
        $admin = User::findOrFail($admin_id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->no_ktp = $request->input('no_ktp');
        $admin->jenis_kelamin = $request->input('jenis_kelamin');
        $admin->tempat_tanggal_lahir = $request->input('tempat_tanggal_lahir');
        $admin->no_tlp = $request->input('no_tlp');
        $admin->alamat = $request->input('alamat');
        $admin->nip = $request->input('nip');
        $admin->save();
        return redirect()->route('profileadmin.index')
            ->with('success', 'Data Berhasil Diupdate');
    }
}
