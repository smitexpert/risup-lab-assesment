<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Md Shanewyz Molla',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('0123456789'),
            'role' => 'Admin'
        ]);
    }
}
