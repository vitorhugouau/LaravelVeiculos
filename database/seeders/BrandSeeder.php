<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'Toyota',
            'Honda',
            'Volkswagen',
            'Chevrolet',
            'Ford',
            'Fiat',
            'Hyundai',
            'Nissan',
            'Renault',
            'Peugeot',
            'Citroën',
            'Jeep',
            'BMW',
            'Mercedes-Benz',
            'Audi',
            'Volvo',
            'Mitsubishi',
            'Suzuki',
            'Kia',
            'Troller',
        ];

        foreach ($brands as $brandName) {
            Brand::create([
                'name' => $brandName,
            ]);
        }
    }
}