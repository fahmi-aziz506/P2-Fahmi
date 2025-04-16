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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outlet_id')->index();
            $table->foreign('outlet_id')->references('id_outlet')->on('outlet')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('nama_perusahaan');
            $table->string('alamat');
            $table->string('telepon', 20);
            $table->string('email_perusahaan');
            $table->string('path_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
