<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear Roles (Safe: firstOrCreate checks existence)
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $roleOperador = Role::firstOrCreate(['name' => 'operador']);

        // Crear usuario Admin solo si no existe (Safe: no sobrescribe contraseña en producción)
        $user = User::firstOrCreate(
            ['email' => 'adminpqrs@intalnet.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('colombia2025**'),
                'email_verified_at' => now(),
            ]
        );

        // Asignar rol sin duplicar
        if (!$user->hasRole('admin')) {
            $user->assignRole($roleAdmin);
        }
    }
}
