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
        // Pengecekan apakah kolom 'nidn' sudah ada
        if (!Schema::hasColumn('users', 'nidn')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('nidn')->nullable()->after('nim'); // Menambahkan kolom 'nidn'
            });
        }

        // Pengecekan untuk menambah kolom 'role' jika diperlukan
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('user')->after('nidn'); // Menambahkan kolom 'role'
            });
        }
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nidn'); // Menghapus kolom 'nidn'
            // Menghapus kolom 'role' jika ada
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
