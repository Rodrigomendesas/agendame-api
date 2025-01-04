<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleManager = Role::create([
            'name' => 'manager',
        ]);
        $permissionManager = Permission::create([
            'name' => 'delete-user',
        ]);
        $roleManager->givePermissionTo($permissionManager);
    }
}
