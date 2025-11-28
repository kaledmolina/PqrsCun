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
            ['email' => 'admin@intalnet.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('1234567'),
                'email_verified_at' => now(),
            ]
        );
    }
}
