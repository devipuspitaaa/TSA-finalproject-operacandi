<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('survei_id');
            $table->foreign('survei_id')
                    ->references('id')
                    ->on('survei')
                    ->onDelete('cascade');
            $table->string('role')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->string('no_tlp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('survei_id');
            $table->foreign('survei_id')
                    ->references('id')
                    ->on('survei')
                    ->onDelete('cascade');
            $table->string('role')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->string('no_tlp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nip')->nullable();
        });
    }
}
