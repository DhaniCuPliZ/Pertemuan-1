<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * berfungsi untuk membuat tabel kategori di database. Kolom id digunakan sebagai primary key, kolom name untuk menyimpan nama kategori, sedangkan timestamps() menambahkan created_at dan updated_at agar waktu pembuatan serta perubahan data dapat tercatat otomatis.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
