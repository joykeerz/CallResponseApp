<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponseDetailHardwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_detail_hardware', function (Blueprint $table) {
            $table->id('response_detail_hardware_id');
            $table->unsignedBigInteger('response_id');
            $table->unsignedBigInteger('hardware_id');
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
        Schema::dropIfExists('response_detail_hardware');
    }
}
