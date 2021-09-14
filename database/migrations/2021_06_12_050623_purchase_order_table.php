<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PurchaseOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order', function (Blueprint $table) {
            $table->increments('id_PO',10);
            $table->string('no_PO')->nullable();
            $table->string('instansi',50);
            $table->date('tgl_pemasangan');
            $table->integer('status')->nullable();
            $table->string('total')->nullable();
            $table->string('ppn')->nullable();
            $table->string('pph')->nullable();
            $table->string('balance')->nullable();
            $table->string('alasan')->nullable();
            $table->string('pic_marketing',50)->nullable();
            $table->string('pic_warehouse',50)->nullable();
            $table->string('pic_admin',50)->nullable();
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
        Schema::dropIfExists('purchase_order');
    }
}
