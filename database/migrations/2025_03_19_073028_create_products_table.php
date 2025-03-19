<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Kolom primary key auto-increment
            $table->string('name'); // Nama produk
            $table->text('description')->nullable(); // Deskripsi produk (boleh kosong)
            $table->decimal('price', 8, 2); // Harga produk (8 digit total, 2 digit desimal)
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products'); // Hapus tabel jika migration di-rollback
    }
}