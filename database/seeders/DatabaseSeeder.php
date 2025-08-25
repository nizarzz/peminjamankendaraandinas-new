<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
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

        // Seeder akun admin default/ update
   // Seeder akun admin default/update
Admin::updateOrCreate(
    ['email' => 'admin@example.com'],
    [
        'name' => 'Admin Utama',
        'password' => bcrypt('password'),
    ]
);
    }
}
