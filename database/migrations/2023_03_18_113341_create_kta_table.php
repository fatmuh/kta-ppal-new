<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_kta')->nullable();
            $table->string('full_name')->nullable();
            $table->string('ttl')->nullable();
            $table->string('agama')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('pangkat_terakhir')->nullable();
            $table->string('nik')->nullable();
            $table->string('tanda_jasa_tertinggi')->nullable();
            $table->string('tanggal_cetak')->nullable();
            $table->string('foto')->nullable();
            $table->string('ttd')->nullable();
            $table->string('istri_suami')->nullable();
            $table->string('nama_istri_suami')->nullable();
            $table->string('nik_istri_suami')->nullable();
            $table->string('alamat1')->nullable();
            $table->string('alamat2')->nullable();
            $table->string('wil_rayon')->nullable();
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
        Schema::dropIfExists('kta');
    }
};
