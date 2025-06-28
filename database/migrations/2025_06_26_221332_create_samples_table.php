<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * ! Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('id_variabel');
            $table->unsignedTinyInteger('id_data')->nullable();
            $table->timestamps();

            // Foreign key ke tabel variabels
            $table->foreign('id_variabel')
                ->references('id')
                ->on('variabels')
                ->onDelete('cascade');
        });
    }

    /**
     * ! Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('samples');
    }
};
