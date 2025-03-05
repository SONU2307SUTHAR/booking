<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Permission::create(['name'=>'edit']);
        Permission::create(['name'=>'add']);
        Permission::create(['name'=>'view']);
        Permission::create(['name'=>'delete']);
        $role = Role::create(['name' => 'client']);
        $role->givePermissionTO('add');
        $role->givePermissionTO('view');
        $role = Role::create(['name' => 'service_provider']);
        $role->givePermissionTO('add');
        $role->givePermissionTO('view');
        $role->givePermissionTO('delete');
        $role->givePermissionTO('edit');

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTO(Permission::all());
    }
}
