<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id('id_menu');
            $table->stirng('nama_menu');
            $table->unsignedBigInteger('kategori_id')->index();
            $table->foreign('kategori_id')->references('id_kategori')->on('kategori')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('deskripsi')->nullable();
            $table->decimal('harga', 12, 2);
            $table->unsignedBigInteger('outlet_id')->index();
            $table->foreign('outlet_id')->references('id_outlet')->on('outlet')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
