<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * !Jalankan perubahan pada tabel samples.
     */
    public function up(): void
    {
        Schema::table('samples', function (Blueprint $table) {
            // Contoh: Menambah kolom baru
            $table->string('nama_sample')->nullable()->after('id');

            // Contoh: Menambah foreign key
            // $table->unsignedTinyInteger('id_user')->nullable()->after('nama_sample');
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * !Batalkan perubahan pada tabel samples.
     */
    public function down(): void
    {
        Schema::table('samples', function (Blueprint $table) {
            // Hapus kolom yang ditambahkan saat up()
            $table->dropColumn('nama_sample');

            // Jika menambahkan FK
            // $table->dropForeign(['id_user']);
            // $table->dropColumn('id_user');
        });
    }
};
