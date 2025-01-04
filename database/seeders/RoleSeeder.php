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
        $admin = Role::create([
            'name' => 'admin',

        ]);
        $atendente = Role::create([
            'name' => 'atendente',

        ]);
        $cliente = Role::create([
            'name' => 'cliente',

        ]);

        $permissionDeleteUser = Permission::create([
            'name' => 'delete-user',
        ]);
        $permissionCreateUser = Permission::create([
            'name' => 'create-user',
        ]);
        $permissionUpdateUser = Permission::create([
            'name' => 'update-user',
        ]);

        $admin->givePermissionTo($permissionDeleteUser);
        $admin->givePermissionTo($permissionCreateUser);
        $admin->givePermissionTo($permissionUpdateUser);

        // $roleManager = Role::create([
        //     'name' => 'manager',
        // ]);
        // $permissionManager = Permission::create([
        //     'name' => 'delete-user',
        // ]);
        // $roleManager->givePermissionTo($permissionManager);
    }
}
