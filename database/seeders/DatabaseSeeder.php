<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
            
        //     'name' => 'Test User',
        //     'email' => 'karemziedan@gmail.com',
        //     'password' => Hash::make('password'),
        //     'phone_number' => '123-456-7890',
        //     'role' => 'user'
        // ]);
        // DB::table('users')->insert([
            
            
        //     'name' => 'Test Admin',
        //     'email' => 'user1@hotmail.com',
        //     'password' => Hash::make('password'),
        //     'phone_number' => '123-456-7890',
        //     'role' => 'user'
        // ]);
        // DB::table('events')->insert([
        
        //     'event_slug' => 'test-event66',
        //     'event_name' => 'Test Event',
        //     'event_date' => '2021-12-31',
        //     'event_time' => '12:00:00',
        //     'event_location' => 'Test Location',
        //     'event_description' => 'Test Description',
        //     'user_id' => 5,
        //     'event_image' => 'default.jpg'
        // ]);

        DB::table('guests')->insert([
            'guest_slug' => 'test-guest1',
            'event_id' => 5,
            'first_name' => 'Test1',
            'last_name' => 'Guest1',
            'phone_number' => '123-456-7890',
            'is_attending' => 1,
            'open_link' => 0,
            'user_id' => 5

        ]);
        DB::table('guests')->insert([
            'guest_slug' => 'test-guest2',
            'event_id' => 5,
            'first_name' => 'Test2',
            'last_name' => 'Guest2',
            'phone_number' => '123-456-7890',
            'is_attending' => 1,
            'open_link' => 0,
            'user_id' => 5
        ]);
        DB::table('guests')->insert([
            'guest_slug' => 'test-guest3',
            'event_id' => 5,
            'first_name' => 'Test3',
            'last_name' => 'Guest3',
            'phone_number' => '123-456-7890',
            'is_attending' => 1,
            'open_link' => 0,
            'user_id' => 5

        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('password')
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test Admin',
        //     'email' => 'test',
        //     'password' => Hash::make('test'),
        //     'role' => 'admin'
        // ]);
        // \App\Models\Guest::factory()->create([
        //     'guest_slug' => 'test-guest',
        //     'event_id' => 1,
        //     'first_name' => 'Test',
        //     'last_name' => 'Guest',
        //     'phone_number' => '123-456-7890',
        //     'is_attending' => 1,
        //     'notes' => 'Test notes',
        //     'open_link' => 'test-link'
        // ]);
    }
}
