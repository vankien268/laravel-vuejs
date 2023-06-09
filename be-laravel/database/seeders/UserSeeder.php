<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'department_id' => 1,
                'status_id' => 1,
            ],
            [
                'name' => 'admin 2',
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('123456'),
                'department_id' => 1,
                'status_id' => 1,
            ],
            [
                'name' => 'admin 3',
                'email' => 'admin3@gmail.com',
                'password' => bcrypt('123456'),
                'department_id' => 1,
                'status_id' => 1,
            ]
        ]);
    }
}
