<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiPengawasPetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('petugas', function (Blueprint $table) {
            $table->unsignedBigInteger('pengawas_id')->nullable(); //menambahkan kolom petugas_id
            $table->foreign('pengawas_id')->references('id')->on('users'); //menambahkan foreign key di kolom petugas_id
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('petugas', function (Blueprint $table) {
            $table->dropForeign(['pengawas_id']);
        });
    }
}
