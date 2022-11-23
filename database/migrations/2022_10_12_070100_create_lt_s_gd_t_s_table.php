<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLtSGdTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lt_s_gd_t_s', function (Blueprint $table) {
            $table->id();
            $table->integer('kode')->uniqe();
            $table->string('namaBarang');
            $table->string('merk');
            $table->string('jumlah');
            $table->string('hargaSatuan');
            $table->string('lokasi');
            $table->date('tahunPembuatan');
            $table->string('tahunBeli');
            $table->integer('hargaKeseluruhan');
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
        Schema::dropIfExists('lt_s_gd_t_s');
    }
}
