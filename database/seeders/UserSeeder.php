<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => '00@00.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'いいい',
                'email' => 'test@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'ううう',
                'email' => 'test2@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'test',
                'email' => 'test3@test.com',
                'password' => Hash::make('password'),
            ]

        ]);
    }
}
