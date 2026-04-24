<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * berfungsi untuk membuat tabel product di database. Di dalamnya terdapat kolom id sebagai primary key, name untuk nama produk, quantity untuk jumlah produk, dan price untuk harga produk. Selain itu terdapat user_id yang terhubung ke tabel users serta category_id yang terhubung ke tabel category menggunakan foreign key, sehingga setiap produk memiliki pemilik user dan kategori tertentu. Bagian cascadeOnDelete() membuat data product ikut terhapus jika data user atau category yang terkait dihapus, sedangkan timestamps() otomatis menambahkan kolom created_at dan updated_at.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('qty');
            $table->decimal('price',10,2);
            $table->timestamps();
        });
    }
};
