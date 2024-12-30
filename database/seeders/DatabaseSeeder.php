<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $password = Hash::make('cesar');

        User::factory()->create([
            'uid' => '01',
            'name' => 'cesar',
            'email' => 'cesar@gmail.com',
            'password' => $password,
            'idroles' => 'A01',
            'gender' => 'Pria',
            'phone_number' => '087643215672',
            'bio' => 'Ini Bio Cesar',
            'foto' => 'default.jpg'
        ]);
    }
}
