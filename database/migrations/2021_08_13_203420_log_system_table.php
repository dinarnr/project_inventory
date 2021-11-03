<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_system', function (Blueprint $table) {
            $table->id('id_log');
            $table->string('name');
            $table->string('email');
            $table->string('deskripsi');
            $table->string('divisi');
            $table->integer('status');
            $table->string('ip')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('log_system');
    }
}
