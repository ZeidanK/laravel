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
            'event_date' => '2024-10-31',
            'event_time' => '12:00:00',
            'event_location' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3374.069620146545!2d35.009924!3d32.256209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzLCsDE1JzIyLjQiTiAzNcKwMDAnMzUuNyJF!5e0!3m2!1sen!2sil!4v1722000402175!5m2!1sen!2sil" width="100%" height="450"',
            'event_description' => 'مرحبا',
            'user_id' => 1,
            'image' => 1,
            'countdown_time' => '2024-10-31',
            'event_image' => 'default.jpg'
        ]);
        DB::table('events')->insert([

            'event_slug' => 'test-event96',
            'event_name' => 'Test Event',
            'event_date' => '2021-12-31',
            'event_time' => '12:00:00',
            'event_location' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3374.069620146545!2d35.009924!3d32.256209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzLCsDE1JzIyLjQiTiAzNcKwMDAnMzUuNyJF!5e0!3m2!1sen!2sil!4v1722000402175!5m2!1sen!2sil" width="100%" height="450"',
            'event_description' => 'السلام',
            'user_id' => 3,
            'image' => 1,
            'event_image' => 'default.jpg'
        ]);


    }
}
