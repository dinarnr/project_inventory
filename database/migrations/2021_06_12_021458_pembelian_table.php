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
            $table->integer('no_PO');
            $table->string('namaBarang',50)->nullable();
            $table->date('tglBeli')->nullable();
            $table->string('harga',50)->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('supplier')->nullable();
            $table->string('sisaBayar',50)->nullable();
            $table->string('totalBayar',50)->nullable();
            $table->string('status',50)->nullable();
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
