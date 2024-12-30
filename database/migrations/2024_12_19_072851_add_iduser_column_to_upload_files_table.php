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
        Schema::table('upload_files', function (Blueprint $table) {
            $table->unsignedBigInteger('uid')->nullable()->after('deskripsi_buku')->required();
            $table->foreign('uid')->references('uid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('upload_files', function (Blueprint $table) {
            $table->dropForeign(['uid']); // Hapus foreign key sebelum menghapus kolom
            $table->dropColumn('uid');
        });
    }
};
