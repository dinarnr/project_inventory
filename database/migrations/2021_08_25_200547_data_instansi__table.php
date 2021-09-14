<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataInstansiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_instansi', function (Blueprint $table) {
            $table->increments('id_instansi');
            $table->string('nama_instansi',50);
            $table->string('kode_instansi',50);
            $table->string('alamat_instansi',50);
            $table->string('telp_instansi',50);
            $table->string('email_instansi',50);
            $table->string('pic_instansi',50);
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
        Schema::dropIfExists('data_instansi');
    }
}
