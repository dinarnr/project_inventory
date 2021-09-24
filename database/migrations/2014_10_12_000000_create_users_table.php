<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('divisi')->nullable();
            $table->string('email')->unique();
            $table->string('gambar')->nullable()->default('no_image.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->dateTime('lastLogin')->nullable();
            $table->dateTime('lastlogout')->nullable();
            $table->string('lastIP')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('users');
    }
}
