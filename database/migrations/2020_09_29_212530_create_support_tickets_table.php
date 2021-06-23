<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("ticket_number")->unique();
            $table->foreignId("user_id")->references('id')->on('users');
            $table->string("title");
            $table->string("message");
            $table->integer("type");
            $table->integer("status")->default(1);
            $table->string("supporting_docs");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support_tickets');
    }
}