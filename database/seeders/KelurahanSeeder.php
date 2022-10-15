<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelurahan = [
            ['nama_kelurahan' => 'Kartoharjo',],
            ['nama_kelurahan' => 'Kanigoro',],
            ['nama_kelurahan' => 'Kelun',],
            ['nama_kelurahan' => 'Rejomulyo',],
            ['nama_kelurahan' => 'Tawangrejo',],
            ['nama_kelurahan' => 'Klegen',],
            ['nama_kelurahan' => 'Oro-Oro Ombo',],
            ['nama_kelurahan' => 'Pilangbango',],
            ['nama_kelurahan' => 'Sukosari',],
            ['nama_kelurahan' => 'Taman',],
            ['nama_kelurahan' => 'Banjarejo',],
            ['nama_kelurahan' => 'Demangan',],
            ['nama_kelurahan' => 'Kejuron',],
            ['nama_kelurahan' => 'Josenan',],
            ['nama_kelurahan' => 'Pandean',],
            ['nama_kelurahan' => 'Manisrejo',],
            ['nama_kelurahan' => 'Mojorejo',],
            ['nama_kelurahan' => 'Kuncen',],
            ['nama_kelurahan' => 'Manguharjo',],
            ['nama_kelurahan' => 'Pangongangan',],
            ['nama_kelurahan' => 'Madiun Lor',],
            ['nama_kelurahan' => 'Patihan',],
            ['nama_kelurahan' => 'Winongo',],
            ['nama_kelurahan' => 'Ngegong',],
            ['nama_kelurahan' => 'Nambangan Kidul',],
            ['nama_kelurahan' => 'Nambangan Lor',],
            ['nama_kelurahan' => 'Sogaten',],

        ];

        DB::table('kelurahan')->insert($kelurahan);
    }
}
