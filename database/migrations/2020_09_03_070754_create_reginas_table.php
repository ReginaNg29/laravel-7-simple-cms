<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reginas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32)->nullable();
            $table->string('username', 32)->nullable();
            $table->string('email', 320)->unique();
            $table->string('password', 64);
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
        Schema::dropIfExists('reginas');
    }
}
