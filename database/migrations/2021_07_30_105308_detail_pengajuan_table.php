<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pengajuan', function (Blueprint $table) {
            $table->increments('id_detailPengajuan');
            $table->string('kode',50)->nullable();
            $table->string('noPO')->nullable();
            $table->string('no_pengajuan',50);
            $table->string('namaBarang',50);
            $table->integer('jmlBarang');
            $table->integer('harga');
            $table->string('jenisBarang',50);
            $table->integer('status')->nullable();
            $table->string('keterangan',50)->nullable();
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
        Schema::dropIfExists('detail_pengajuan');
    }
}
