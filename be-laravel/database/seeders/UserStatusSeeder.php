<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('user_status')->insert([
            [ 'name' => 'Đang hoạt động'],
            [ 'name' => 'Tạm khóa']
        ]);
    }
}
