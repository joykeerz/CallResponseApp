<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_responses', function (Blueprint $table) {
            $table->id('response_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('recieve_id');
            // $table->foreign('call_id')->references('id')->on('call_recieves');
            $table->string('action', 20)->default('ticket opened');
            $table->string('result', 20)->default('ticket opened');
            $table->string('description', 20)->default('ticket opened');
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
        Schema::dropIfExists('call_responses');
    }
}
