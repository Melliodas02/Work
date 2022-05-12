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
        Schema::create('vebinar__docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_VEBINAR');
            $table->text('Description');
            $table->string('FileSrc');
            $table->string('Status')->nullable(true);
            $table->timestamps();

            $table->foreign('ID_VEBINAR')
                ->references('id')
                ->on('vebinars')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vebinar__docs');
    }
};
