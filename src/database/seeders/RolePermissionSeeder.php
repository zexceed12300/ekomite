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
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'bendahara']);

        $permission = Permission::create(['name' => 'manage siswa']);
        $permission = Permission::create(['name' => 'manage pembayaran']);
        $permission = Permission::create(['name' => 'manage settings']);
    }
}
