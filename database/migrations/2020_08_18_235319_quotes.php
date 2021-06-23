<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Quotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string("number")->unique();
            $table->string("product_ids");
            $table->foreignId("user_id")->references('id')->on('users');
            $table->foreignId("destination_id")->references('id')->on('ports');
            $table->string("origin_ids");
            $table->string("quantities");
            $table->string("prices");
            $table->boolean("is_order")->default(false)->nullable();
            $table->boolean("is_paid")->default(false)->nullable();
            $table->boolean("is_shipped")->default(false)->nullable();
            $table->boolean("valid")->default(true)->nullable();
            $table->string('commission');
            $table->string("notify_name");
            $table->string("phone");
            $table->string("email");
            $table->string("address");
            $table->string('payment_type');
            $table->string('payment_method');
            $table->longText('extra_instructions')->nullable();
            $table->string('current_status')->default(1);
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
        Schema::dropIfExists('quotes');
    }
}
