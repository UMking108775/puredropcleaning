<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user
        User::updateOrCreate(
            ['email' => 'admin@puredropcleaning.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]
        );
    }
}
