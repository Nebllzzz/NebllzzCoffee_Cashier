<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin123',
            'role' => 'admin'
        ]);

        Kategori::create([
            'kategori' => 'Hot Coffee'
        ]);

        Kategori::create([
            'kategori' => 'Cold Coffee'
        ]);
        
        Kategori::create([
            'kategori' => 'Specialty Coffee'
        ]);
        
        Kategori::create([
            'kategori' => 'Non Coffee'
        ]);

        Kategori::create([
            'kategori' => 'Tea'
        ]);

        Kategori::create([
            'kategori' => 'Smoothies'
        ]);

        Kategori::create([
            'kategori' => 'Juice'
        ]);

        Kategori::create([
            'kategori' => 'Soda'
        ]);
    }
}
