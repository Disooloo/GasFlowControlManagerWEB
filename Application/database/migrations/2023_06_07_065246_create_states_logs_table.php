<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gas_compressor_id');
            $table->string('state_name', 255);
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->float('current_power');
            $table->float('current_pressure');
            $table->string('Based');
            $table->foreign('gas_compressor_id')->references('id')->on('gas_compressors');
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
        Schema::dropIfExists('states_logs');
    }
};
