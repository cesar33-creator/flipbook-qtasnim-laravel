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
            $table->string('division')->after('username')->required();
            $table->foreign('division')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_activity', function (Blueprint $table) {
            $table->dropColumn('division');
        });
    }
};
