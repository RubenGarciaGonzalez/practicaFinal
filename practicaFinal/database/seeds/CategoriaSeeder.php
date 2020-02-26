<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre'=>'Electronica'
        ]);

        Categoria::create([
            'nombre'=>'Belleza'
        ]);

        Categoria::create([
            'nombre'=>'Jardin'
        ]);

        Categoria::create([
            'nombre'=>'Joyeria'
        ]);

        Categoria::create([
            'nombre'=>'Videojuegos'
        ]);
    }
}
