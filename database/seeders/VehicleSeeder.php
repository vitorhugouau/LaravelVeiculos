<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Color;

class VehicleSeeder extends Seeder
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
        $jeep = Brand::where('name', 'Jeep')->first();
        $bmw = Brand::where('name', 'BMW')->first();
        $mercedes = Brand::where('name', 'Mercedes-Benz')->first();
        $audi = Brand::where('name', 'Audi')->first();

        $corolla = CarModel::where('name', 'Corolla')->first();
        $hilux = CarModel::where('name', 'Hilux')->first();
        $civic = CarModel::where('name', 'Civic')->first();
        $hrv = CarModel::where('name', 'HR-V')->first();
        $gol = CarModel::where('name', 'Gol')->first();
        $polo = CarModel::where('name', 'Polo')->first();
        $tcross = CarModel::where('name', 'T-Cross')->first();
        $onix = CarModel::where('name', 'Onix')->first();
        $cruze = CarModel::where('name', 'Cruze')->first();
        $tracker = CarModel::where('name', 'Tracker')->first();
        $ka = CarModel::where('name', 'Ka')->first();
        $ranger = CarModel::where('name', 'Ranger')->first();
        $argo = CarModel::where('name', 'Argo')->first();
        $toro = CarModel::where('name', 'Toro')->first();
        $hb20 = CarModel::where('name', 'HB20')->first();
        $creta = CarModel::where('name', 'Creta')->first();
        $kicks = CarModel::where('name', 'Kicks')->first();
        $duster = CarModel::where('name', 'Duster')->first();
        $renegade = CarModel::where('name', 'Renegade')->first();
        $x5 = CarModel::where('name', 'X5')->first();
        $classeC = CarModel::where('name', 'Classe C')->first();
        $q5 = CarModel::where('name', 'Q5')->first();

        $branco = Color::where('colors', 'Branco')->first();
        $preto = Color::where('colors', 'Preto')->first();
        $prata = Color::where('colors', 'Prata')->first();
        $cinza = Color::where('colors', 'Cinza')->first();
        $vermelho = Color::where('colors', 'Vermelho')->first();
        $azul = Color::where('colors', 'Azul')->first();
        $verde = Color::where('colors', 'Verde')->first();
        $prataMetalico = Color::where('colors', 'Prata Metálico')->first();
        $pretoPérola = Color::where('colors', 'Preto Pérola')->first();

        $vehicles = [
            [
                'photo' => 'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?w=800',
                'brand_id' => $toyota->id,
                'model_id' => $corolla->id,
                'color_id' => $branco->id,
                'year' => 2023,
                'mileage' => 15000,
                'price' => 145000.00,
                'description' => 'Toyota Corolla 2023, automático, completo, único dono, revisões em dia. Veículo em excelente estado de conservação.',
            ],
            [
                'photo' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
                'brand_id' => $toyota->id,
                'model_id' => $hilux->id,
                'color_id' => $preto->id,
                'year' => 2022,
                'mileage' => 25000,
                'price' => 280000.00,
                'description' => 'Toyota Hilux 2022, 4x4, diesel, cabine dupla, excelente para trabalho e lazer.',
            ],
            [
                'photo' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=800',
                'brand_id' => $toyota->id,
                'model_id' => $corolla->id,
                'color_id' => $prata->id,
                'year' => 2021,
                'mileage' => 35000,
                'price' => 125000.00,
                'description' => 'Toyota Corolla 2021, manual, bem conservado, todas as revisões feitas na concessionária.',
            ],

            [
                'photo' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=800',
                'brand_id' => $honda->id,
                'model_id' => $civic->id,
                'color_id' => $pretoPérola->id,
                'year' => 2023,
                'mileage' => 12000,
                'price' => 165000.00,
                'description' => 'Honda Civic 2023, turbo, automático, completo, com todos os opcionais. Veículo seminovo.',
            ],
            [
                'photo' => 'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=800',
                'brand_id' => $honda->id,
                'model_id' => $hrv->id,
                'color_id' => $branco->id,
                'year' => 2022,
                'mileage' => 18000,
                'price' => 135000.00,
                'description' => 'Honda HR-V 2022, flex, automático, excelente consumo, ideal para cidade.',
            ],

            [
                'photo' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
                'brand_id' => $volkswagen->id,
                'model_id' => $gol->id,
                'color_id' => $vermelho->id,
                'year' => 2021,
                'mileage' => 40000,
                'price' => 65000.00,
                'description' => 'Volkswagen Gol 2021, flex, manual, econômico e confiável. Ótimo para primeiro carro.',
            ],
            [
                'photo' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=800',
                'brand_id' => $volkswagen->id,
                'model_id' => $polo->id,
                'color_id' => $branco->id,
                'year' => 2022,
                'mileage' => 22000,
                'price' => 95000.00,
                'description' => 'Volkswagen Polo 2022, TSI, automático, completo, excelente desempenho.',
            ],
            [
                'photo' => 'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=800',
                'brand_id' => $volkswagen->id,
                'model_id' => $tcross->id,
                'color_id' => $cinza->id,
                'year' => 2023,
                'mileage' => 10000,
                'price' => 140000.00,
                'description' => 'Volkswagen T-Cross 2023, turbo, automático, SUV compacto, espaço interno generoso.',
            ],

            [
                'photo' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
                'brand_id' => $chevrolet->id,
                'model_id' => $onix->id,
                'color_id' => $prata->id,
                'year' => 2023,
                'mileage' => 8000,
                'price' => 75000.00,
                'description' => 'Chevrolet Onix 2023, turbo, manual, completo, melhor custo-benefício do mercado.',
            ],
            [
                'photo' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=800',
                'brand_id' => $chevrolet->id,
                'model_id' => $cruze->id,
                'color_id' => $preto->id,
                'year' => 2022,
                'mileage' => 20000,
                'price' => 115000.00,
                'description' => 'Chevrolet Cruze 2022, turbo, automático, sedã esportivo, excelente dirigibilidade.',
            ],
            [
                'photo' => 'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=800',
                'brand_id' => $chevrolet->id,
                'model_id' => $tracker->id,
                'color_id' => $azul->id,
                'year' => 2023,
                'mileage' => 15000,
                'price' => 130000.00,
                'description' => 'Chevrolet Tracker 2023, turbo, automático, SUV compacto, tecnologia e conforto.',
            ],

            [
                'photo' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
                'brand_id' => $ford->id,
                'model_id' => $ka->id,
                'color_id' => $branco->id,
                'year' => 2021,
                'mileage' => 45000,
                'price' => 55000.00,
                'description' => 'Ford Ka 2021, flex, manual, econômico, ideal para uso urbano.',
            ],
            [
                'photo' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=800',
                'brand_id' => $ford->id,
                'model_id' => $ranger->id,
                'color_id' => $branco->id,
                'year' => 2022,
                'mileage' => 30000,
                'price' => 250000.00,
                'description' => 'Ford Ranger 2022, 4x4, diesel, cabine dupla, robusta e confiável.',
            ],

            [
                'photo' => 'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=800',
                'brand_id' => $fiat->id,
                'model_id' => $argo->id,
                'color_id' => $vermelho->id,
                'year' => 2022,
                'mileage' => 28000,
                'price' => 70000.00,
                'description' => 'Fiat Argo 2022, flex, manual, completo, design moderno e jovem.',
            ],
            [
                'photo' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
                'brand_id' => $fiat->id,
                'model_id' => $toro->id,
                'color_id' => $preto->id,
                'year' => 2023,
                'mileage' => 12000,
                'price' => 180000.00,
                'description' => 'Fiat Toro 2023, diesel, automática, cabine dupla, picape média premium.',
            ],

            [
                'photo' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=800',
                'brand_id' => $hyundai->id,
                'model_id' => $hb20->id,
                'color_id' => $prataMetalico->id,
                'year' => 2022,
                'mileage' => 25000,
                'price' => 72000.00,
                'description' => 'Hyundai HB20 2022, turbo, manual, completo, garantia de fábrica.',
            ],
            [
                'photo' => 'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=800',
                'brand_id' => $hyundai->id,
                'model_id' => $creta->id,
                'color_id' => $branco->id,
                'year' => 2023,
                'mileage' => 10000,
                'price' => 128000.00,
                'description' => 'Hyundai Creta 2023, automático, SUV compacto, tecnologia avançada.',
            ],

            [
                'photo' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
                'brand_id' => $nissan->id,
                'model_id' => $kicks->id,
                'color_id' => $azul->id,
                'year' => 2022,
                'mileage' => 20000,
                'price' => 118000.00,
                'description' => 'Nissan Kicks 2022, flex, automático, SUV compacto, espaço e conforto.',
            ],

            [
                'photo' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=800',
                'brand_id' => $renault->id,
                'model_id' => $duster->id,
                'color_id' => $vermelho->id,
                'year' => 2021,
                'mileage' => 35000,
                'price' => 95000.00,
                'description' => 'Renault Duster 2021, flex, manual, SUV robusto, ótimo para estrada.',
            ],

            [
                'photo' => 'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=800',
                'brand_id' => $jeep->id,
                'model_id' => $renegade->id,
                'color_id' => $verde->id,
                'year' => 2023,
                'mileage' => 8000,
                'price' => 155000.00,
                'description' => 'Jeep Renegade 2023, turbo, automático, 4x4, design diferenciado.',
            ],

            [
                'photo' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
                'brand_id' => $bmw->id,
                'model_id' => $x5->id,
                'color_id' => $preto->id,
                'year' => 2022,
                'mileage' => 15000,
                'price' => 450000.00,
                'description' => 'BMW X5 2022, turbo, automático, SUV de luxo, todos os opcionais, veículo premium.',
            ],

            [
                'photo' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=800',
                'brand_id' => $mercedes->id,
                'model_id' => $classeC->id,
                'color_id' => $prata->id,
                'year' => 2021,
                'mileage' => 28000,
                'price' => 320000.00,
                'description' => 'Mercedes-Benz Classe C 2021, automático, sedã de luxo, conforto e tecnologia.',
            ],

            [
                'photo' => 'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=800',
                'brand_id' => $audi->id,
                'model_id' => $q5->id,
                'color_id' => $cinza->id,
                'year' => 2022,
                'mileage' => 18000,
                'price' => 380000.00,
                'description' => 'Audi Q5 2022, turbo, automático, SUV premium, design esportivo e elegante.',
            ],
        ];

        $moreVehicles = [
            [
                'photo' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=800',
                'brand_id' => $toyota->id,
                'model_id' => $corolla->id,
                'color_id' => $azul->id,
                'year' => 2020,
                'mileage' => 55000,
                'price' => 105000.00,
                'description' => 'Toyota Corolla 2020, automático, bem conservado, histórico completo.',
            ],
            [
                'photo' => 'https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=800',
                'brand_id' => $honda->id,
                'model_id' => $civic->id,
                'color_id' => $prata->id,
                'year' => 2019,
                'mileage' => 60000,
                'price' => 110000.00,
                'description' => 'Honda Civic 2019, manual, completo, revisões em dia.',
            ],
            [
                'photo' => 'https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=800',
                'brand_id' => $volkswagen->id,
                'model_id' => $gol->id,
                'color_id' => $branco->id,
                'year' => 2020,
                'mileage' => 50000,
                'price' => 58000.00,
                'description' => 'Volkswagen Gol 2020, flex, manual, econômico, primeiro dono.',
            ],
        ];

        $allVehicles = array_merge($vehicles, $moreVehicles);

        foreach ($allVehicles as $vehicle) {
            Vehicle::create($vehicle);
        }
    }
}
