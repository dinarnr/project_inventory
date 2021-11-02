<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->increments('id_pembelian');
            $table->string('no_pengajuan',50);
            $table->string('nama_pemohon',50)->nullable();
            $table->date('tgl_pengajuan');
            $table->string('pic_teknisi',50)->nullable();
            $table->string('pic_marketing',50)->nullable();
            $table->string('pic_warehouse',50)->nullable();
            $table->string('pic_admin',50)->nullable();
            $table->string('pic_purchasing',50)->nullable();
            $table->string('alasan',50)->nullable();
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
        Schema::dropIfExists('pembelian');
    }
}
