<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'categoria' => 'Lugares',
                'estado' => 'A',
                
            ],
            [
                'categoria' => 'Verbos',
                'estado' => 'A',
            ],
            [
                'categoria' => 'Colores',
                'estado' => 'A',
            ],
            [
                'categoria' => 'Adverbios',
                'estado' => 'A',
            ],
            [
                'categoria' => 'Sustantivos',
                'estado' => 'A',
            ],
            [
                'categoria' => 'Adjetivos',
                'estado' => 'A',
            ],
          
        ];

        foreach($categorias as $key => $value) {
            Categorias::create($value);
        }//
    }
}







