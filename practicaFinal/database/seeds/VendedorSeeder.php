<?php

use Illuminate\Database\Seeder;
use App\Vendedor;
use Illuminate\Support\Facades\DB;


class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendedor::create([
            'nombre'=>'Ruben',
            'apellidos'=>'Garcia Gonzalez',
            'edad'=>'20'
        ]);
    }
}
