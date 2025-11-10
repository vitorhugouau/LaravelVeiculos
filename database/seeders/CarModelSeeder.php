<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
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

        $toyota = Brand::where('name', 'Toyota')->first();
        $honda = Brand::where('name', 'Honda')->first();
        $volkswagen = Brand::where('name', 'Volkswagen')->first();
        $chevrolet = Brand::where('name', 'Chevrolet')->first();
        $ford = Brand::where('name', 'Ford')->first();
        $fiat = Brand::where('name', 'Fiat')->first();
        $hyundai = Brand::where('name', 'Hyundai')->first();
        $nissan = Brand::where('name', 'Nissan')->first();
        $renault = Brand::where('name', 'Renault')->first();
        $peugeot = Brand::where('name', 'Peugeot')->first();
        $citroen = Brand::where('name', 'Citroën')->first();
        $jeep = Brand::where('name', 'Jeep')->first();
        $bmw = Brand::where('name', 'BMW')->first();
        $mercedes = Brand::where('name', 'Mercedes-Benz')->first();
        $audi = Brand::where('name', 'Audi')->first();
        $volvo = Brand::where('name', 'Volvo')->first();
        $mitsubishi = Brand::where('name', 'Mitsubishi')->first();
        $suzuki = Brand::where('name', 'Suzuki')->first();
        $kia = Brand::where('name', 'Kia')->first();
        $troller = Brand::where('name', 'Troller')->first();

        $models = [

            ['name' => 'Corolla', 'brand_id' => $toyota->id],
            ['name' => 'Hilux', 'brand_id' => $toyota->id],
            ['name' => 'RAV4', 'brand_id' => $toyota->id],
            ['name' => 'SW4', 'brand_id' => $toyota->id],
            ['name' => 'Yaris', 'brand_id' => $toyota->id],

            ['name' => 'Civic', 'brand_id' => $honda->id],
            ['name' => 'City', 'brand_id' => $honda->id],
            ['name' => 'HR-V', 'brand_id' => $honda->id],
            ['name' => 'CR-V', 'brand_id' => $honda->id],
            ['name' => 'Fit', 'brand_id' => $honda->id],

            ['name' => 'Gol', 'brand_id' => $volkswagen->id],
            ['name' => 'Polo', 'brand_id' => $volkswagen->id],
            ['name' => 'Virtus', 'brand_id' => $volkswagen->id],
            ['name' => 'Jetta', 'brand_id' => $volkswagen->id],
            ['name' => 'T-Cross', 'brand_id' => $volkswagen->id],
            ['name' => 'Tiguan', 'brand_id' => $volkswagen->id],
            ['name' => 'Amarok', 'brand_id' => $volkswagen->id],

            ['name' => 'Onix', 'brand_id' => $chevrolet->id],
            ['name' => 'Prisma', 'brand_id' => $chevrolet->id],
            ['name' => 'Cruze', 'brand_id' => $chevrolet->id],
            ['name' => 'Tracker', 'brand_id' => $chevrolet->id],
            ['name' => 'Equinox', 'brand_id' => $chevrolet->id],
            ['name' => 'S10', 'brand_id' => $chevrolet->id],
            ['name' => 'Spin', 'brand_id' => $chevrolet->id],

            ['name' => 'Ka', 'brand_id' => $ford->id],
            ['name' => 'Fusion', 'brand_id' => $ford->id],
            ['name' => 'Edge', 'brand_id' => $ford->id],
            ['name' => 'Ranger', 'brand_id' => $ford->id],
            ['name' => 'EcoSport', 'brand_id' => $ford->id],
            ['name' => 'Territory', 'brand_id' => $ford->id],

            ['name' => 'Uno', 'brand_id' => $fiat->id],
            ['name' => 'Palio', 'brand_id' => $fiat->id],
            ['name' => 'Argo', 'brand_id' => $fiat->id],
            ['name' => 'Mobi', 'brand_id' => $fiat->id],
            ['name' => 'Cronos', 'brand_id' => $fiat->id],
            ['name' => 'Toro', 'brand_id' => $fiat->id],
            ['name' => 'Strada', 'brand_id' => $fiat->id],

            ['name' => 'HB20', 'brand_id' => $hyundai->id],
            ['name' => 'HB20S', 'brand_id' => $hyundai->id],
            ['name' => 'Creta', 'brand_id' => $hyundai->id],
            ['name' => 'Tucson', 'brand_id' => $hyundai->id],
            ['name' => 'Santa Fe', 'brand_id' => $hyundai->id],
            ['name' => 'ix35', 'brand_id' => $hyundai->id],

            ['name' => 'March', 'brand_id' => $nissan->id],
            ['name' => 'Versa', 'brand_id' => $nissan->id],
            ['name' => 'Kicks', 'brand_id' => $nissan->id],
            ['name' => 'Frontier', 'brand_id' => $nissan->id],
            ['name' => 'X-Trail', 'brand_id' => $nissan->id],

            ['name' => 'Kwid', 'brand_id' => $renault->id],
            ['name' => 'Sandero', 'brand_id' => $renault->id],
            ['name' => 'Logan', 'brand_id' => $renault->id],
            ['name' => 'Duster', 'brand_id' => $renault->id],
            ['name' => 'Captur', 'brand_id' => $renault->id],

            ['name' => '208', 'brand_id' => $peugeot->id],
            ['name' => '2008', 'brand_id' => $peugeot->id],
            ['name' => '3008', 'brand_id' => $peugeot->id],
            ['name' => 'Partner', 'brand_id' => $peugeot->id],

            ['name' => 'C3', 'brand_id' => $citroen->id],
            ['name' => 'C4 Cactus', 'brand_id' => $citroen->id],
            ['name' => 'Jumper', 'brand_id' => $citroen->id],

            ['name' => 'Renegade', 'brand_id' => $jeep->id],
            ['name' => 'Compass', 'brand_id' => $jeep->id],
            ['name' => 'Commander', 'brand_id' => $jeep->id],

            ['name' => '320i', 'brand_id' => $bmw->id],
            ['name' => 'X1', 'brand_id' => $bmw->id],
            ['name' => 'X3', 'brand_id' => $bmw->id],
            ['name' => 'X5', 'brand_id' => $bmw->id],

            ['name' => 'Classe A', 'brand_id' => $mercedes->id],
            ['name' => 'Classe C', 'brand_id' => $mercedes->id],
            ['name' => 'GLA', 'brand_id' => $mercedes->id],
            ['name' => 'GLC', 'brand_id' => $mercedes->id],

            ['name' => 'A3', 'brand_id' => $audi->id],
            ['name' => 'A4', 'brand_id' => $audi->id],
            ['name' => 'Q3', 'brand_id' => $audi->id],
            ['name' => 'Q5', 'brand_id' => $audi->id],

            ['name' => 'XC40', 'brand_id' => $volvo->id],
            ['name' => 'XC60', 'brand_id' => $volvo->id],

            ['name' => 'L200', 'brand_id' => $mitsubishi->id],
            ['name' => 'Outlander', 'brand_id' => $mitsubishi->id],
            ['name' => 'ASX', 'brand_id' => $mitsubishi->id],

            ['name' => 'Jimny', 'brand_id' => $suzuki->id],
            ['name' => 'Vitara', 'brand_id' => $suzuki->id],
            ['name' => 'S-Cross', 'brand_id' => $suzuki->id],

            ['name' => 'Picanto', 'brand_id' => $kia->id],
            ['name' => 'Rio', 'brand_id' => $kia->id],
            ['name' => 'Sportage', 'brand_id' => $kia->id],
            ['name' => 'Sorento', 'brand_id' => $kia->id],

            ['name' => 'T4', 'brand_id' => $troller->id],
        ];

        foreach ($models as $model) {
            CarModel::create($model);
        }
    }
}
