<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            [
                'categoria_id' => 1,
                'nombre' => 'Arroz Integral',
                'descripcion' => 'Arroz integral de alta calidad',
                'precio' => 3.99,
                'cantidad' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 2,
                'nombre' => 'Atún enlatado',
                'descripcion' => 'Atún enlatado en aceite de oliva',
                'precio' => 2.75,
                'cantidad' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 3,
                'nombre' => 'Yogur Griego',
                'descripcion' => 'Yogur griego natural sin azúcares añadidos',
                'precio' => 1.99,
                'cantidad' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 4,
                'nombre' => 'Salchichas Ahumadas',
                'descripcion' => 'Salchichas ahumadas de carne de res',
                'precio' => 5.50,
                'cantidad' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 5,
                'nombre' => 'Pan Integral',
                'descripcion' => 'Pan integral fresco',
                'precio' => 2.25,
                'cantidad' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 6,
                'nombre' => 'Detergente Multiusos',
                'descripcion' => 'Detergente para la limpieza del hogar',
                'precio' => 4.49,
                'cantidad' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 7,
                'nombre' => 'Champú Nutritivo',
                'descripcion' => 'Champú enriquecido con vitaminas',
                'precio' => 6.99,
                'cantidad' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 8,
                'nombre' => 'Salsa Barbacoa',
                'descripcion' => 'Salsa barbacoa con un toque ahumado',
                'precio' => 3.25,
                'cantidad' => 45,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 9,
                'nombre' => 'Galletas de Chocolate',
                'descripcion' => 'Galletas con trozos de chocolate',
                'precio' => 2.99,
                'cantidad' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 10,
                'nombre' => 'Bebida Energética',
                'descripcion' => 'Bebida energética para un impulso rápido',
                'precio' => 1.79,
                'cantidad' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
      DB::table('productos')->insert($productos);
    }
}
