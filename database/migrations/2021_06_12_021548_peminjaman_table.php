<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->increments('id_peminjaman');
            $table->string('no_peminjaman');
            $table->string('kebutuhan',50);
            $table->string('pic_teknisi',50);
            $table->string('pic_warehouse',50)->nullable();
            $table->string('status')->nullable();
            $table->date('tglPinjam')->nullable();
            $table->date('tglKembali')->nullable();
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
        Schema::dropIfExists('peminjaman');
    }
}
