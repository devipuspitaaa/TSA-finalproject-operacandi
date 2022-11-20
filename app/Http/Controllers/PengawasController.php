<?php

namespace App\Http\Controllers;
use App\Models\Pengawas;
use App\Models\Survei;
use App\Models\User;
use Illuminate\Http\Request;

class PengawasController extends Controller
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
        $pengawas =User::with('survei')
        ->where('role', 'pengawas')
        ->get();

        $pengawas = User::where([
            ['survei_id', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('survei_id', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
        ->where('role', 'pengawas')
        ->orderBy('id', 'asc')
            ->simplePaginate(1000);

        return view('pengawas.index', compact('pengawas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        // if ($request->has('search')) { // Jika ingin melakukan pencarian judul
        //     $pengawas = Pengawas::where('nama_lengkap', 'like', "%" . $request->search . "%")->paginate(5);
        // } else { // Jika tidak melakukan pencarian judul
        //     //fungsi eloquent menampilkan data menggunakan pagination
        //     $pengawas = Pengawas::orderBy('id', 'desc')->paginate(1000); // Pagination menampilkan 5 data
        // }
        // return view('pengawas.index', compact('pengawas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $survei = Survei::all();
        return view('pengawas.create', ['survei' => $survei]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $survei = Survei::all();
        $request->validate([
            'nama_lengkap' => 'required',
            'survei_id' => 'required',
            'no_ktp' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_tanggal_lahir' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
            'nip' => 'required',
        ]);
        $pengawas = new Pengawas();
        $pengawas->nama_lengkap = $request->get('nama_lengkap');
        $pengawas->survei_id = $request->get('survei_id');
        $pengawas->no_ktp = $request->get('no_ktp');
        $pengawas->jenis_kelamin = $request->get('jenis_kelamin');
        $pengawas->tempat_tanggal_lahir = $request->get('tempat_tanggal_lahir');
        $pengawas->no_tlp = $request->get('no_tlp');
        $pengawas->alamat = $request->get('alamat');
        $pengawas->nip = $request->get('nip');

        $survei = new Survei();
        $survei->id = $request->get('survei_id');

        $pengawas->survei()->associate($survei);
        $pengawas->save();

        // Pengawas::create([

        //     'nama_lengkap' => $request->nama_lengkap,
        //     'no_ktp' => $request->no_ktp,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
        //     'no_tlp' => $request->no_tlp,
        //     'alamat' => $request->alamat,
        //     'nip' => $request->nip,
        // ]);
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        // return 'Data Berhasil Ditambahkan';
        return redirect()->route('pengawas.index')
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
        $pengawas = Pengawas::find($id);
        return view('pengawas.detail', compact('pengawas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengawas::find($id);
        $survei = Survei::all();
        return view('pengawas.edit', ['data' => $data, 'survei' => $survei]);
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
        $pengawas = Pengawas::find($id);
        $pengawas-> nama_lengkap = $request->nama_lengkap;
        $pengawas-> no_ktp = $request->no_ktp;
        $pengawas-> jenis_kelamin = $request->jenis_kelamin;
        $pengawas-> tempat_tanggal_lahir = $request->tempat_tanggal_lahir;
        $pengawas-> no_tlp = $request->no_tlp;
        $pengawas-> alamat = $request->alamat;
        $pengawas-> nip = $request->nip;
        $pengawas->save();

        return redirect()->route('pengawas.index')
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
        $pengawas = User::find($id);
        $pengawas->delete();
        return redirect()->route('pengawas.index')
            ->with('success', 'Data Berhasil Dihapus');
    }
    public function tampil(Request $request)
    {
        if ($request->has('search')) { // Jika ingin melakukan pencarian judul
            $pengawas = Pengawas::where('nama_lengkap', 'like', "%" . $request->search . "%")->paginate(5);
        } else { // Jika tidak melakukan pencarian judul
            //fungsi eloquent menampilkan data menggunakan pagination
            $pengawas = Pengawas::orderBy('id', 'desc')->paginate(5); // Pagination menampilkan 5 data
        }
        return view('pengawas.tampil', compact('pengawas'));
    }
}
