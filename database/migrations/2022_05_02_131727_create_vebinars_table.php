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
        Schema::create('vebinars', function (Blueprint $table) {
            $table->id();
            $table->dateTime('DateTime')->nullable(true);
            $table->string('Topic');
            $table->string('Address')->nullable(true);
            $table->string('Stage')->nullable(true);
            $table->string('Status')->nullable(true);
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
        Schema::dropIfExists('vebinars');
    }
};
