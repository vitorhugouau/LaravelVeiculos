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
        $colors = [
            'Branco',
            'Preto',
            'Prata',
            'Cinza',
            'Vermelho',
            'Azul',
            'Verde',
            'Amarelo',
            'Laranja',
            'Bege',
            'Marrom',
            'Dourado',
            'Roxo',
            'Rosa',
            'Azul Marinho',
            'Vermelho Metálico',
            'Prata Metálico',
            'Preto Pérola',
            'Branco Pérola',
        ];

        foreach ($colors as $colorName) {
            Color::create([
                'colors' => $colorName,
            ]);
        }
    }
}