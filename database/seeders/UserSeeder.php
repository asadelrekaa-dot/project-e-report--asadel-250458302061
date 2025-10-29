<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(array(
            array(
                
                'name' => 'Admin Jay',
                'email' => 'Admin@gmail.com',
                'phone' => '123435352',
                'nik' => '81983120',
                'gender' => 'male',
                'role' => 'admin',
                'password' => bcrypt('78317290')
            ),
            array(
                
                'name' => 'User Jungwon',
                'email' => 'User@gmail.com',
                'phone' => '992131',
                'nik' => '838643',
                'gender' => 'male',
                'role' => 'admin',
                'password' => bcrypt('3425266')
            ),
            ));
    }
}
