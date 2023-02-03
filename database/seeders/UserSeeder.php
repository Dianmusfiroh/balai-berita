<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.id',
            'role' => 'admin',
            'password' => bcrypt('1234567890'),
        ]);
        $ketua = User::create([
            'name' => 'ketua',
            'email' => 'ketua@ketua.id',
            'role' => 'ketua',
            'password' => bcrypt('1234567890'),
        ]);
        }
}
