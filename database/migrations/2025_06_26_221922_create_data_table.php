<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('id_sample');
            $table->unsignedTinyInteger('id_variabel');
            $table->integer('nilai')->default(0);
            $table->integer('hasil_dist')->default(0);
            $table->integer('hasil_k')->default(0);
            $table->timestamps();
            $table->foreign('id_sample')->references('id')->on('samples')->onDelete('cascade');
            $table->foreign('id_variabel')->references('id')->on('variabels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
