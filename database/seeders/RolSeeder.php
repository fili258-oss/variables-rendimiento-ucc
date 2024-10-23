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
        // Verifica si los roles ya existen antes de crearlos
        $role1 = Role::firstOrCreate(['name' => 'Admin']);
        $role2 = Role::firstOrCreate(['name' => 'Advisor']);
        $role3 = Role::firstOrCreate(['name' => 'Teacher']);
        $role4 = Role::firstOrCreate(['name' => 'Psychologist']);

        // Asignación de permisos como ya lo haces
        Permission::firstOrCreate(['name' => 'importReportsGeneral.index'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'importReportsGeneral.import'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'importReportsGeneral.edit'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'importReportsGeneral.destroy'])->assignRole($role1);

        Permission::firstOrCreate(['name' => 'importReportsIndividual.index'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'importReportsIndividual.import'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'importReportsIndividual.edit'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'importReportsIndividual.destroy'])->assignRole($role1);

        Permission::firstOrCreate(['name' => 'importReportsSitAcademicStudents.index'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'importReportsSitAcademicStudents.import'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'importReportsSitAcademicStudents.edit'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'importReportsSitAcademicStudents.destroy'])->assignRole($role1);

        Permission::firstOrCreate(['name' => 'usersList.index'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'usersList.create'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'usersList.edit'])->assignRole($role1);
        Permission::firstOrCreate(['name' => 'usersList.destroy'])->assignRole($role1);

        Permission::firstOrCreate(['name' => 'globalReports.index'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'reportsGeneral.index'])->syncRoles([$role1, $role2]);
        Permission::firstOrCreate(['name' => 'reportsIndividual.index'])->syncRoles([$role1, $role2]);
    }
}
    