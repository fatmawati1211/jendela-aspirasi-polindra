<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_laporan');
            $table->string('kategori_laporan');
            $table->text('deskripsi')->nullable();
            $table->string('file_terlampir')->nullable();
            $table->enum('kategori_privasi', ['Publik', 'Privat']);
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
