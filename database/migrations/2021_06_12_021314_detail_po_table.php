<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_po', function (Blueprint $table) {
            $table->increments('id_po');
            $table->string('no_PO',50);
            $table->string('no_SO',50);
            $table->string('nama_barang',50);
            $table->integer('jumlah');
            $table->decimal('rate', $precision = 19, $scale = 3);
            $table->decimal('amount',  $precision = 19, $scale = 3);
            $table->string('keterangan_barang')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('detail_po');
    }
}
