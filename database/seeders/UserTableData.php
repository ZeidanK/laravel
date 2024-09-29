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

            'name' => 'karim ziedan',
            'email' => 'karemziedan@gmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '123-456-7890',
            'role' => 'admin'
        ]);
        DB::table('users')->insert([

            'name' => 'sari abdul',
            'email' => 'sari70779@gmail.com',
            'password' => Hash::make('password1'),
            'phone_number' => '123-456-7890',
            'role' => 'admin'
        ]);
        DB::table('users')->insert([


            'name' => 'Client 1 test',
            'email' => 'user1@hotmail.com',
            'password' => Hash::make('1'),
            'phone_number' => '123-456-7890',
            'role' => 'user'
        ]);
        DB::table('users')->insert([


            'name' => 'Test Client2',
            'email' => 'user2@hotmail.com',
            'password' => Hash::make('2'),
            'phone_number' => '123-456-7890',
            'role' => 'user'
        ]);
    }
}
