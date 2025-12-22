<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'adminpqrs@intalnet.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('colombia2025**'),
                'email_verified_at' => now(),
            ]
        );
    }
}
