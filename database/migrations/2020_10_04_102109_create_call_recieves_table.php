<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallRecievesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_recieves', function (Blueprint $table) {
            $table->id('recieve_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('user_id');
            // $table->foreign('customer_id')->references('id')->on('customers');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->string('location', 50);
            $table->string('equipment', 20);
            $table->string('idNumber', 50);
            $table->text('problem', 255);
            $table->text('ticket_number', 10);
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
        Schema::dropIfExists('call_recieves');
    }
}
