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
        Schema::create('gas_compressors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('manufacturer', 255);
            $table->float('max_pressure');
            $table->float('max_flow_rate');
            $table->float('efficiency');
            $table->boolean("power")->default(0);
            $table->integer("status")->default(0);
            $table->boolean('warning')->default(0);
            $table->boolean('connect')->default(0);
            $table->float('current_flow_rate')->nullable();
            $table->float('current_pressure')->nullable();
            $table->float('current_efficiency')->nullable();
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
        Schema::dropIfExists('gas_compressors');
    }
};
