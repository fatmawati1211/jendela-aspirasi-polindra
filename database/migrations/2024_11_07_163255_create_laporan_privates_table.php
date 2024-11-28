<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPrivatesTable extends Migration
{
    public function up()
    {
        Schema::create('laporan_privates', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('isi_laporan');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_privates');
    }
}