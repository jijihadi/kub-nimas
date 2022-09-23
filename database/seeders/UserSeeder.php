<?php

namespace Database\Seeders;

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
                'name' => 'Si Admin',
                'email' => 'admin@nimasarta.com',
                'password' => Hash::make('password'),
                'role' => 2
            ],
            [
                'name' => 'Joko Ridinakin',
                'email' => 'kub1@nimasarta.com',
                'password' => Hash::make('password'),
                'role' => 1
            ],
            [
                'name' => 'Martisal Jikironi',
                'email' => 'kub2@nimasarta.com',
                'password' => Hash::make('password'),
                'role' => 1
            ],
            [
                'name' => 'Lordana Sikih',
                'email' => 'kub3@nimasarta.com',
                'password' => Hash::make('password'),
                'role' => 1
            ],
            [
                'name' => 'Mastian Lindor',
                'email' => 'kub4@nimasarta.com',
                'password' => Hash::make('password'),
                'role' => 1
            ],
        ]);
    }
}
