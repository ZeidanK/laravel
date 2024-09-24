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

            'name' => 'karim zeidan',
            'email' => 'karemziedan@gmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '123-456-7890',
            'role' => 'admin'
        ]);
        DB::table('users')->insert([


            'name' => 'Test client1',
            'email' => 'user1@hotmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '123-456-7890',
            'role' => 'user'
        ]);
        DB::table('users')->insert([


            'name' => 'Test client2',
            'email' => 'user2@hotmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '123-456-7890',
            'role' => 'user'
        ]);
    }
}
