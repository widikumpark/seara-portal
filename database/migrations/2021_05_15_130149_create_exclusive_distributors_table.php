<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExclusiveDistributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exclusive_distributors', function (Blueprint $table) {
            $table->id();
            $table->string("request_number")->unique();
            $table->foreignId("user_id")->references('id')->on('users');
            $table->string('product_name');
            $table->string('current_status')->default("active");
            $table->string('package_name');
            $table->bigInteger('package_cost');
            $table->string('country_name');
            $table->string('company_name');
            $table->string('phone');
            $table->string('payment_method');

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
        Schema::dropIfExists('exclusive_distributors');
    }
}