<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("moq");
            $table->string("measuring_unit")->nullable();
            $table->longText("desc");
            $table->longText("specification")->nullable();
            $table->bigInteger('price')->nullable();
            $table->string("image_url_1")->nullable();
            $table->string("image_url_2")->nullable();
            $table->string("origin")->nullable();
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
        Schema::dropIfExists('products');
    }
}