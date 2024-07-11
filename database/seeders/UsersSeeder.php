<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Trần Xuân Hiếu',
                'email' => 'admin0306211244@caothang.edu.vn',
                'phone' => '0942632795',
                'age' => 22,
                'gender' => 1,
                'level' => 1,
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'Trần Xuân Hiếu',
                'email' => '0306211244@caothang.edu.vn',
                'phone' => '0942632795',
                'age' => 20,
                'gender' => 1,
                'level' => 1,
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
            [
                'name' => 'Võ Thành Trung',
                'email' => '0306211310@caothang.edu.vn',
                'phone' => '0372010220',
                'age' => 1,
                'gender' => 0,
                'level' => 1,
                'password' => Hash::make('user123'),
                'role' => 'user',
            ],
            [
                'name' => 'Võ Thành Trung',
                'email' => 'admin0306211310@caothang.edu.vn',
                'phone' => '0372010220',
                'age' => 21,
                'gender' => 1,
                'level' => 1,
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ],
        ]);
    }
}
