<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Order::factory(10)->for(User::factory()->state([
             'email' => env('SEED_USERNAME', 'demo@example.com'),
             'password' => Hash::make(env('SEED_PASSWORD', 'example')),
         ]))->create();
    }
}
