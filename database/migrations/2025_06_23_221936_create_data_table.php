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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sample')->constrained('samples')->onDelete('cascade');
            $table->foreignId('id_variabel')->constrained('variabels')->onDelete('cascade');
            $table->integer('nilai')->default(0);
            $table->float('hasil_dist')->default(0);
            $table->integer('hasil_k')->default(0);
            $table->timestamps();
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
