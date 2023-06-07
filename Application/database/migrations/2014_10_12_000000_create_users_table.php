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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('Position', 255)->default("null");
            $table->string('password');
            $table->string('Phone')->default("null");;
            $table->string('Description')->default("null");;
            $table->string('Image', 255)->default("https://www.svgrepo.com/show/192247/man-user.svg");
            $table->boolean('IsAdmin')->default(0);
            $table->boolean("Moderation")->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
