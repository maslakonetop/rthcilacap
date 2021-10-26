<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatarthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datarths', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_rth');
            $table->string('nama_taman');
            $table->string('lokasi');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('kecamatan');
            $table->double('luas', 15, 2);
            $table->string('status_lahan');
            $table->string('keterangan')->nullable();
            $table->string('file_kml')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datarths');
    }
}
