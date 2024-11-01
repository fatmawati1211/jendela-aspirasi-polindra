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
        // Pengecekan apakah kolom 'nim' sudah ada
        if (!Schema::hasColumn('users', 'nim')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('nim')->after('id')->unique(); // Menambahkan kolom 'nim'
            });
        }
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nim'); // Menghapus kolom 'nim' saat rollback
        });
    }
};
