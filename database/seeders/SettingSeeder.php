<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::firstOrCreate(
            ['key' => 'cun_provider_code'],
            [
                'label' => 'Código de Proveedor CUN (Prefijo)',
                'value' => '7714',
            ]
        );
    }
}
