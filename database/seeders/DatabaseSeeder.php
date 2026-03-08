<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'htuanqn',
            'email' => 'tuan@mstsoftware.vn',
            'password' => Hash::make('tuan@mstsoftware.vn'),
            'full_name' => 'Phạm Hoàng Tuấn',
            'role' => 'admin',
            'status' => 1,
        ]);
    }
}
