<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * ! Jalankan migrasi: membuat tabel users.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * ! Membatalkan migrasi: menghapus tabel users.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // ✅ Sudah diperbaiki dari 'uers' ke 'users'
    }
};
