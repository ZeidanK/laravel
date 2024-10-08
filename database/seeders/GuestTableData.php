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
            'first_name' => 'فريد',
            'last_name' => 'نجم',
            'phone_number' => '123-456-7890',

            'open_link' => 0,
            'user_id' => 3
        ]);
        DB::table('guests')->insert([
            'guest_slug' => 'test-guest3',
            'event_id' => 1,
            'first_name' => 'اعتماد',
            'last_name' => 'العوضي',
            'phone_number' => '123-456-7890',

            'open_link' => 0,
            'user_id' => 3

        ]);
        DB::table('guests')->insert([
            'guest_slug' => 'test-guest4',
            'event_id' => 1,
            'first_name' => 'شهاب',
            'last_name' => 'الدين',
            'phone_number' => '123-456-7890',

            'open_link' => 0,
            'user_id' => 4
        ]);
        DB::table('guests')->insert([
            'guest_slug' => 'test-guest5',
            'event_id' => 1,
            'first_name' => 'ثامر',
            'last_name' => 'هلال',
            'phone_number' => '123-456-7890',

            'open_link' => 0,
            'user_id' => 4
        ]);
        DB::table('guests')->insert([
            'guest_slug' => 'test-guest6',
            'event_id' => 1,
            'first_name' => 'يوسف',
            'last_name' => 'لاشين',
            'phone_number' => '123-456-7890',

            'open_link' => 0,
            'user_id' => 4
        ]);
        DB::table('guests')->insert([
            'guest_slug' => 'test-guest7',
            'event_id' => 1,
            'first_name' => 'بيبي',
            'last_name' => 'نجم',
            'phone_number' => '123-456-7890',

            'open_link' => 1,
            'user_id' => 3
        ]);
        DB::table('guests')->insert([
            'guest_slug' => 'test-guest8',
            'event_id' => 1,
            'first_name' => 'ناصر',
            'last_name' => 'العوضي',
            'phone_number' => '123-456-7890',
            'open_link' => 1,
            'user_id' => 3
        ]);
    }
}
