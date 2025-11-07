<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarModel;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarModel::create([
            'name' => 'Corolla',
            'brand_id' => 1,
        ]);

        CarModel::create([
            'name' => 'Civic',
            'brand_id' => 2,
        ]);

        CarModel::create([
            'name' => 'F-150',
            'brand_id' => 3,
        ]);

        CarModel::create([
            'name' => 'Cobalt',
            'brand_id' => 4,
        ]);

        CarModel::create([
            'name' => 'X5',
            'brand_id' => 5,
        ]);
    }
}
