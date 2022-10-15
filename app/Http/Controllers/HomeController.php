<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $dt_entry = array();

        // ambil data pengawas 
        $dt_pengawas = DB::table("pengawas")->get();

        /**
         *  1. Tampil data pengawas get()
         *      1.1 Tampil data petugas berdasarkan (WHERE) pengawas get()
         *          1.1.1 Tampil data target berdasarkan (WHERE) petugas get()
         *  
         */

        // @TODO 1 : Tampil data pengawas
        foreach ($dt_pengawas as $kolom) {

            // @TODO 2 : Tampil data petugas berdasarkan pengawas = pengawas_id
            $pengawas_id = $kolom->id;
            $dt_petugas = DB::table("petugas")->where('pengawas_id', $pengawas_id)->get();


            $total_target_terkini = 0;
            $arr_petugas = array();
            foreach ($dt_petugas as $kolom_petugas) {


                // @TODO 3 : Tampil data target berdsarkan petugas
                $petugas_id = $kolom_petugas->id;
                $dt_target = DB::table("targets")->where('petugas_id', $petugas_id)->get();

                array_push($arr_petugas, array(

                    'petugas'   => $kolom_petugas,
                    'target'    => $dt_target
                ));
            }


            array_push($dt_entry, array(

                'infopengawas'  => $kolom,
                'infopetugas'   => $arr_petugas
            ));
        }



        // kolom target
        $kolomTable = DB::table("targets")->select("tanggal")->groupBy("tanggal")->get();



        // area ---- komulatif
        $dt_survey = DB::table("survei")->first();
        $dt_statistik = $this->statistik();
        
        return view('home', compact('dt_entry', 'kolomTable', 'dt_survey', 'dt_statistik'));
    }



    function statistik() {

        // ambil data total target
        $chart = [];


        $dt_target = DB::table("survei");
        
        // cek apakah sudh terisi
        if ( $dt_target->count() > 0 ) {

            $isi = $dt_target->first();

            $totalPengawas = $isi->total_pengawas;
            $totalPetugas  = $isi->target_petugas;

            $target = $totalPengawas * $totalPetugas;

            // data realisasi target
            $dt_realisasi = DB::table("targets")->groupBy("tanggal")->get();
            
            // nilai temporary 
            $temp_target = 0;
            $temp_realisasi = 0;


            foreach ( $dt_realisasi AS $urutan => $kolom ) {

                // ambil data realisasi target detail berdasarkan tanggal
                $dt_realisasi_by_tanggal = DB::table("targets")->where(["tanggal" => $kolom->tanggal])->get();
                $total_realisasi = 0;
                foreach ( $dt_realisasi_by_tanggal AS $kolom_realisasi ) {

                    $total_realisasi += $kolom_realisasi->target;
                }


                // append
                if ( $urutan == 0 ) {

                    $temp_target = $target;
                    $temp_realisasi = $total_realisasi;
                } else {

                    $temp_target += $target;
                    $temp_realisasi += $total_realisasi;
                }

                
                array_push($chart, array(

                    'tanggal'   => $kolom->tanggal,
                    'target'    => $temp_target,
                    'realisasi' => $temp_realisasi
                ));
            }
        }


        
        return $chart;
    }
}
