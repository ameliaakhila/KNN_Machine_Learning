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
        Schema::create('variabels', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('variabel', 100);
            $table->string('status', 100); // Contoh: Variabel / Variabel Uji
            $table->string('keterangan', 100);
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * ! Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('variabels');
    }
};
