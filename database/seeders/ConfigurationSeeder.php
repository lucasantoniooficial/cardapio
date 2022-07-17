<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::create([
            'name' => 'Nome a definir',
            'logo' => 'img/logo.png',
            'type' => 'A definir',
            'delivery' => 40,
            'delivery_fee' => 3.00,
            'open' => now()->format('H:i:s'),
            'close' => now()->format('H:i:s'),
        ]);
    }
}
