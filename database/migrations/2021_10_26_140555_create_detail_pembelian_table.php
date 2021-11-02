<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->increments('id_pembelian');
            $table->string('no_pengajuan',50);
            $table->string('namaBarang',50);
            $table->integer('harga');
            $table->integer('jmlBarang');
            $table->integer('totalBeli');
            $table->string('jenisTransaksi',50);
            $table->string('info',50)->nullable();
            $table->integer('harga_beli')->nullable();
            $table->integer('amount');
            $table->string('supplier',50);

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
        Schema::dropIfExists('detail_pembelian');
    }
}
