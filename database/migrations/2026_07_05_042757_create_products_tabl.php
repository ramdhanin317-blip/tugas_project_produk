<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel categories dengan onDelete cascade
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('nama_produk');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};