<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::create([
            'photo' => 'https://via.placeholder.com/150',
            'brand_id' => 1,
            'model_id' => 1,
            'color_id' => 1,
            'year' => 2020,
            'mileage' => 50000,
            'price' => 75000,
            'description' => 'Toyota Corolla 2020 com 50.000 km rodados.',
        ]);

        Vehicle::create([
            'photo' => 'https://via.placeholder.com/150',
            'brand_id' => 2,
            'model_id' => 2,
            'color_id' => 2,
            'year' => 2019,
            'mileage' => 40000,
            'price' => 85000,
            'description' => 'Honda Civic 2019, sem detalhes, excelente estado.',
        ]);

        Vehicle::create([
            'photo' => 'https://via.placeholder.com/150',
            'brand_id' => 3,
            'model_id' => 3,
            'color_id' => 3,
            'year' => 2021,
            'mileage' => 30000,
            'price' => 95000,
            'description' => 'Ford F-150 2021, caminhonete com baixa quilometragem.',
        ]);

        Vehicle::create([
            'photo' => 'https://via.placeholder.com/150',
            'brand_id' => 4,
            'model_id' => 4,
            'color_id' => 4,
            'year' => 2018,
            'mileage' => 60000,
            'price' => 50000,
            'description' => 'Chevrolet Cobalt 2018, excelente custo-benefício.',
        ]);

        Vehicle::create([
            'photo' => 'https://via.placeholder.com/150',
            'brand_id' => 5,
            'model_id' => 5,
            'color_id' => 5,
            'year' => 2022,
            'mileage' => 10000,
            'price' => 120000,
            'description' => 'BMW X5 2022, SUV de luxo, ótimo estado.',
        ]);
    }
}
