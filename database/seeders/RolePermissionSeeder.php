<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'lihat-user']);
        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'hapus-user']);

        Permission::create(['name' => 'pendaftaran']);

        Permission::create(['name' => 'lihat-daftar']);
        Permission::create(['name' => 'edit-daftar']);
        Permission::create(['name' => 'hapus-daftar']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'maba']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo([
            'lihat-user',
            'tambah-user',
            'edit-user',
            'hapus-user',
            'lihat-daftar',
            'edit-daftar',
            'hapus-daftar',
        ]);

        $roleMaba = Role::findByName('maba');
        $roleMaba->givePermissionTo([
            'pendaftaran',
        ]);
    }
}
