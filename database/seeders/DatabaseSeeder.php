<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@techiserve.com',
            'userRole' => 1,
            'password' =>  Hash::make(123)
         
        ]);


        
        \App\Models\User::factory()->create([
            'name' => 'Vincent Mhokore',
            'email' => 'vincent@admin.com',
            'userRole' => 1,
            'password' =>  Hash::make(123)
         
        ]);
    }
}
