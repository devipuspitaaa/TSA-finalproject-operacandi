<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Models\Target;
use Carbon\Carbon;
use Auth;
use PDF;
use File;
use League\CommonMark\CommonMarkConverter;

class TargetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $targets = Target::with('petugas')->get();

        $targets = Target::where([
            ['petugas_id', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('petugas_id', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->simplePaginate(1000);

        return view('target.index', compact('targets'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $petugas = Petugas::all(); //mendapatkan data dari tabel petugas
        return view('target.create', ['petugas' => $petugas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $petugas = Petugas::all();
        $request->validate([
            'tanggal' => Carbon::now(),
            'petugas_id' => 'required',
            'target' => 'required',
        ]);

        $targets = new Target;
        $targets->tanggal = Carbon::now();
        $targets->target = $request->get('target');
        $targets->petugas_id = $request->get('petugas_id');
        $targets->save();

        $petugas = new Petugas;
        $petugas->id = $request->get('petugas_id');

        //fungsi eloquent untuk menambah data dengan relasi belongsTO
        $targets->petugas()->associate($petugas);
        $targets->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        // return 'Data Berhasil Ditambahkan';
        return redirect()->route('target.index')
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
        $targets = Target::find($id);
        return view('target.tampil', compact('targets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Target::find($id);
        $petugas = Petugas::all();

        return view('target.edit', ['data' => $data, 'petugas' => $petugas]);
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
        $targets = Target::find($id);
        // $targets->tanggal = $request->tanggal;
        $targets->petugas_id = $request->petugas_id;
        $targets->target = $request->target;
        $targets->save();

        return redirect()->route('target.index')
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
        Target::find($id)->delete();
        return redirect()->route('target.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

    public function tampil(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $targets = Target::where('nama_petugas', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $targets = Target::orderBy('nama_petugas', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('target.tampil', compact('target'));
    }

    
    public function cetaktarget()
    {
        $targets = Target::all();

    $pdf = PDF::loadView('dashboard.cetaktarget', ['targets' => $targets]);
    return $pdf->stream('Laporan-Data-Target-Survei.pdf');
    }
}
