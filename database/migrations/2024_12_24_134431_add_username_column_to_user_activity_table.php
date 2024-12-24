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
        Schema::table('user_activity', function (Blueprint $table) {
            $table->unsignedBigInteger('username')->after('id')->required();
            $table->foreign('username')->references('uid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_activity', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};
