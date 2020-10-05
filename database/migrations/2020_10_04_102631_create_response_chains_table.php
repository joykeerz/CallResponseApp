<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponseChainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_chains', function (Blueprint $table) {
            $table->id('chain_id');
            $table->unsignedBigInteger('response_id');
            // $table->foreign('response_id')->references('id')->on('call_responses');
            $table->string('action', 20);
            $table->string('result', 20);
            $table->string('description', 20);
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
        Schema::dropIfExists('response_chains');
    }
}
