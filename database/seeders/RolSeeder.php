<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Advisor']);

        Permission::create(['name' => 'importReportsGeneral.index'])->assignRole($role1);
        Permission::create(['name' => 'importReportsGeneral.import'])->assignRole($role1);
        Permission::create(['name' => 'importReportsGeneral.edit'])->assignRole($role1);
        Permission::create(['name' => 'importReportsGeneral.destroy'])->assignRole($role1);

        Permission::create(['name' => 'importReportsIndividual.index'])->assignRole($role1);
        Permission::create(['name' => 'importReportsIndividual.import'])->assignRole($role1);
        Permission::create(['name' => 'importReportsIndividual.edit'])->assignRole($role1);
        Permission::create(['name' => 'importReportsIndividual.destroy'])->assignRole($role1);

        Permission::create(['name' => 'usersList.index'])->assignRole($role1);
        Permission::create(['name' => 'usersList.create'])->assignRole($role1);
        Permission::create(['name' => 'usersList.edit'])->assignRole($role1);
        Permission::create(['name' => 'usersList.destroy'])->assignRole($role1);

        
        Permission::create(['name' => 'globalReports.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'reportsGeneral.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'reportsIndividual.index'])->syncRoles([$role1, $role2]);

        
    }
}