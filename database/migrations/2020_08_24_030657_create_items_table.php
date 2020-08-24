vagra<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('Items')){
            Schema::create('Items', function (Blueprint $table) {
                $table->increments ('id');
                $table->unsignedInteger ('amount');
                $table->string ('name');
                $table->string ('description');
                $table->string ('createdData');
                $table->string ('updatedData');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Items');
    }
}
