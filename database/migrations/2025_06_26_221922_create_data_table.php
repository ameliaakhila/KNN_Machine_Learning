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
        Schema::create('data', function (Blueprint $table) {
            $table->tinyIncrements('id');

            // Foreign keys
            $table->unsignedTinyInteger('id_sample');
            $table->unsignedTinyInteger('id_variabel');

            // Nilai data
            $table->integer('nilai')->default(0);

            // Optional class (misalnya untuk klasifikasi)
            $table->string('class', 50)->nullable();

            $table->timestamps();

            // Relasi foreign key
            $table->foreign('id_sample')->references('id')->on('samples')->onDelete('cascade');
            $table->foreign('id_variabel')->references('id')->on('variabels')->onDelete('cascade');
        });
    }

    /**
     * ! Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
