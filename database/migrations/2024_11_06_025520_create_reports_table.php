<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id('id_laporan'); // kolom id laporan
            $table->string('kategori_laporan'); // kolom kategori laporan
            $table->string('file_terlampir')->nullable(); // kolom file terlampir
            $table->text('deskripsi'); // kolom deskripsi laporan
            $table->string('kategori_privasi'); // kolom untuk publik/private
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
