<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate(['name' => 'admin']); // Buat role admin jika belum ada
        $user = User::find(1); // Ganti 1 dengan ID pengguna yang ingin diberi role

        if ($user) {
            $user->assignRole('admin');
        }
    }
}
