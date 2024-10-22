<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
           'gender_id' => 1,
           'name' => 'admin',
           'lastname' => 'sistema',
           'type_document' => 'CC',
           'identification' => '1193522332',
           'email' => 'admin@admin.com',
           'password' => bcrypt('12345678')
           
        ])->assignRole('Admin');

        /* User::factory(9)->create(); */
    }
}