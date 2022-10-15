<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiPetugasTargetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('targets', function (Blueprint $table) {
            $table->dropColumn('nama_petugas'); //menghapus nama kolom
            $table->unsignedBigInteger('petugas_id')->nullable(); //menambahkan kolom petugas_id
            $table->foreign('petugas_id')->references('id')->on('petugas'); //menambahkan foreign key di kolom petugas_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('targets', function (Blueprint $table) {
            $table->string('nama_petugas');
            $table->dropForeign(['petugas_id']);
        });
    }
}
