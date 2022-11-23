<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->date('tglpeminjaman');
            $table->string('peminjam');
            $table->string('namabarang');
            $table->integer('kode1')->uniqe();
            $table->string('jumlah1');
            $table->string('lokasi1');
            $table->string('kondisi1');
            $table->string('bagiansarpras');
            $table->date('tglpengembalian')->nullable();
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
        Schema::dropIfExists('riwayats');
    }
}
