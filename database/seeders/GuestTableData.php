<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class GuestTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('guests')->insert([
            'guest_slug' => 'test-guest2',
            'event_id' => 1,
            'first_name' => 'Test2',
            'last_name' => 'Guest2',
            'phone_number' => '123-456-7890',
            'is_attending' => 1,
            'open_link' => 0,
            'user_id' => 1
        ]);
        DB::table('guests')->insert([
            'guest_slug' => 'test-guest3',
            'event_id' => 1,
            'first_name' => 'Test3',
            'last_name' => 'Guest3',
            'phone_number' => '123-456-7890',
            'is_attending' => 1,
            'open_link' => 0,
            'user_id' => 1

        ]);
        DB::table('guests')->insert([
            'guest_slug' => 'test-guest1',
            'event_id' => 1,
            'first_name' => 'Test1',
            'last_name' => 'Guest1',
            'phone_number' => '123-456-7890',
            'is_attending' => 1,
            'open_link' => 0,
            'user_id' =>1

        ]);
    }
}
