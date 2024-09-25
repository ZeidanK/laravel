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
        
        // UserTableData::run(" php artisan DB:seed --class=UserTableData");
        
        // EventTableData::run(" php artisan DB:seed --class=EventTableData")  ; 
        // GuestTableData::run(" php artisan DB:seed --class=GuestTableData");

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
