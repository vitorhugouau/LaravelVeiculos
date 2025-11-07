<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'colors' => 'Preto',
        ]);

        Color::create([
            'colors' => 'Branco',
        ]);

        Color::create([
            'colors' => 'Prata',
        ]);

        Color::create([
            'colors' => 'Azul',
        ]);

        Color::create([
            'colors' => 'Vermelho',
        ]);
    }
}
