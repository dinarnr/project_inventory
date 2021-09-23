<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailTransaksiKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi_keluar', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->string('no_transaksi',50);
            $table->string('no_PO',50);
            $table->string('no_SO',50);
            $table->string('kode_barang',50);
            $table->string('nama_barang',255);
            $table->string('jns_barang',50);
            $table->string('keterangan',50);
            $table->integer('jumlah');
            $table->integer('kategori');
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
        Schema::dropIfExists('detail_transaksi_keluar');
    }
}
