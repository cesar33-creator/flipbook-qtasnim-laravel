<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // $user1 = User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com'
        // ]);

        // $user2 = User::factory()->create([
        //     'name' => 'finance',
        //     'email' => 'finance@gmail.com'
        // ]);

        $roleSuperAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        // $user1->assignRole($roleSuperAdmin);

        $roleFinance = Role::firstOrCreate(['name' => 'Finance' , 'guard_name' => 'web']);
        
    }
}
