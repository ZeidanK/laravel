<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use DB;

class UserTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([

            'name' => 'Test User',
            'email' => 'karemziedan@gmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '123-456-7890',
            'role' => 'user'
        ]);
        DB::table('users')->insert([


            'name' => 'Test Admin',
            'email' => 'user1@hotmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '123-456-7890',
            'role' => 'user'
        ]);
    }
}
