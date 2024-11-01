<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');

        $maba = User::create([
            'name' => 'maba',
            'email' => 'maba@maba.com',
            'password' => bcrypt('12345678'),
        ]);
        $maba->assignRole('maba');
    }
}
