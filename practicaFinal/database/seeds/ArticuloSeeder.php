<?php

use Illuminate\Database\Seeder;
use App\Articulo;
use Illuminate\Support\Facades\DB;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulos')->truncate(); 

        Articulo::create([
            'nombre'=>'PSP',
            'stock'=>'31',
            'precio'=>'99.12',
            'detalles'=>'Consola antigua que sirve para poco la verdad'
        ]);
    }
}
