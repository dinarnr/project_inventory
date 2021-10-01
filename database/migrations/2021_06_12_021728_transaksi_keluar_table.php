<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_keluar', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->string('no_transaksi',50);
            $table->string('no_PO',50);
            $table->date('tgl_transaksi')->nullable();
            $table->date('tgl_instalasi')->nullable();
            $table->string('jns_barang',50);
            $table->string('instansi',50);
            $table->string('ekspedisi',50);
            $table->string('pengirim',50);
            $table->string('penerima',50);
            $table->string('pic_teknisi',50);
            $table->string('pic_marketing',50);
            $table->string('pic_warehouse',50);
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
        Schema::dropIfExists('transaksi_keluar');
    }
}
