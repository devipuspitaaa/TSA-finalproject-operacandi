<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class PenggunaController extends Controller
{
    public function create(){
        $user=User::all();
        return view('admin.user.create', compact('user'));
    }

    public function store(Request $request) {
        $user = new user;
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        if ($user) {
            Session::flash('success','Data user Berhasil Ditambahkan');
            return redirect()->route('admin.user.create');
        } else {
            Session::flash('failed','Data user Gagal Ditambahkan');
            return redirect()->route('admin.user.create');
        }
    }
}
