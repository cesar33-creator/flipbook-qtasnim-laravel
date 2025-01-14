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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('role_id')->nullable(); // Foreign key untuk role
            $table->string('foto')->nullable();
            $table->enum('gender',['Pria','Wanita'])->nullable();
            $table->string('bio')->nullable();
            $table->string('phone_number')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('role_id') // Definisikan role_id sebagai foreign key
                ->references('id')     // Mereferensikan kolom 'id' di tabel 'roles'
                ->on('roles')          // Nama tabel asal
                ->onDelete('set null'); // Jika role dihapus, set role_id ke NULL
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
