<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailTransaksiMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi_masuk', function (Blueprint $table) {
            $table->increments('id_transaksi')->nullable();
            $table->string('no_transaksi',50)->nullable();
            $table->string('kode_barang',50)->nullable();
            $table->date('tgl_transaksi',50)->nullable();
            $table->string('supplier',50)->nullable();
            $table->string('no_PO',50)->nullable();
            $table->string('nama_barang',50)->nullable();
            $table->string('instansi',50)->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('kondisi',50)->nullable();
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
        Schema::dropIfExists('detail_transaksi_masuk');
    }
}
