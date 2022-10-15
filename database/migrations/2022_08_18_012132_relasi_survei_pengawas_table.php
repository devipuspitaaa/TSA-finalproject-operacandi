<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiSurveiPengawasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengawas', function (Blueprint $table) {
            $table->unsignedBigInteger('survei_id')->nullable(); //menambahkan kolom survei_id
            $table->foreign('survei_id')->references('id')->on('survei'); //menambahkan foreign key di kolom survei_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengawas', function (Blueprint $table) {
            $table->dropForeign(['survei_id']);
        });
    }
}
