<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_masuk', function (Blueprint $table) {
            $table->increments('id',10);
            $table->string('no_transaksi', 50)->nullable();
            $table->date('tgl_transaksi')->nullable();
            $table->string('nama_barang', 50)->nullable();
            $table->string('no_PO', 50)->nullable();
            $table->string('kondisi', 50)->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('nama_supplier', 50)->nullable();
            $table->string('instansi', 50)->nullable();
            $table->string('pengirim', 50)->nullable();
            $table->string('penerima', 50)->nullable();
            $table->string('keterangan', 50)->nullable();
            // $table->string('jenisBarang', 50);
            // $table->string('ekspedisi',50);
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
        Schema::dropIfExists('transaksi_masuk');
    }
}
