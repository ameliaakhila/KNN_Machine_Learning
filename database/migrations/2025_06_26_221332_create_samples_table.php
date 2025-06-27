<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->dropForeign(['id_variabel']); // Hapus FK dulu
            $table->dropColumn('id_variabel');
            $table->dropColumn('id_data');
            $table->timestamps();
            $table->foreign('id_variabel')->references('id')->on('variabels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('samples', function (Blueprint $table) {
            $table->unsignedTinyInteger('id_variabel');
            $table->unsignedTinyInteger('id_data')->nullable();
            $table->foreign('id_variabel')->references('id')->on('variabels')->onDelete('cascade');
        });
    }
};
