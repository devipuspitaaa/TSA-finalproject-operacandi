<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class SurveiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $form = Survei::where('nama_kelurahan', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $form = Survei::orderBy('id', 'desc')->paginate(1000); // Pagination menampilkan 5 data
        }
        return view('form.index', compact('form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.inputForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Survei::create([
            'id' => $request->id,
            'nama_survei' => $request->nama_survei,
            'total_target' => $request->total_target,
            'total_petugas' => $request->total_petugas,
            'total_pengawas' => $request->total_pengawas,
            'jh_penyelesaian' => $request->jh_penyelesaian,
            'target_petugas' => $request->target_petugas,
        ]);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        // return 'Data Berhasil Ditambahkan';
        return redirect()->route('form.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = Survei::find($id);
        return view('form.tampil', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Survei::find($id);

        return view('form.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = Survei::find($id);
        $form->nama_survei = $request->nama_survei;
        $form->total_target = $request->total_target;
        $form->total_petugas = $request->total_petugas;
        $form->total_pengawas = $request->total_pengawas;
        $form->jh_penyelesaian = $request->jh_penyelesaian;
        $form->target_petugas = $request->target_petugas;
        $form->save();

        return redirect()->route('form.index')
            ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Survei::find($id)->delete();
        return redirect()->route('form.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

    public function tampil(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $form = Survei::where('nama_kelurahan', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $form = Survei::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('form.tampil', compact('form'));
    }
}
