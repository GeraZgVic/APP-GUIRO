<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['categoria' => 'Alimentos secos', 'created_at' => now(),'updated_at' => now()],
            ['categoria' => 'Conservas y enlatados', 'created_at' => now(),'updated_at' => now()],
            ['categoria' => 'Productos lácteos', 'created_at' => now(),'updated_at' => now()],
            ['categoria' => 'Carnes y embutidos', 'created_at' => now(),'updated_at' => now()],
            ['categoria' => 'Panadería y cereales', 'created_at' => now(),'updated_at' => now()],
            ['categoria' => 'Productos de limpieza', 'created_at' => now(),'updated_at' => now()],
            ['categoria' => 'Productos de cuidado personal', 'created_at' => now(),'updated_at' => now()],
            ['categoria' => 'Condimentos y salsas', 'created_at' => now(),'updated_at' => now()],
            ['categoria' => 'Snacks y dulces', 'created_at' => now(),'updated_at' => now()],
            ['categoria' => 'Refrescos y Bebidas', 'created_at' => now(),'updated_at' => now()]
        ];
      DB::table('categorias')->insert($categorias);
    }
}
