<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class EventTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('events')->insert([

            'event_slug' => 'test-event66',
            'event_name' => 'Test Event',
            'event_date' => '2021-12-31',
            'event_time' => '12:00:00',
            'event_location' => 'Test Location',
            'event_description' => 'Test Description',
            'user_id' => 1,
            'event_image' => 'default.jpg'
        ]);


    }
}
