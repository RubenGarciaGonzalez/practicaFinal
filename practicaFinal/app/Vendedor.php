<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vendedor;
use App\Articulo;

class Vendedor extends Model
{
    protected $fillable = ['nombre', 'apellidos', 'edad', 'perfil'];

    public function articulos(){
        return $this->belongsToMany('App\Articulo')->withPivot('cantidad', 'fecha_venta')->withTimestamps();
    }

    public function sumaVentas(){
        $sum = 0;
        foreach ($this->articulos as $item) {
            $sum+=$item->pivot->cantidad;
        }
        return $sum;
    }

    public function masVendido(Vendedor $vendedor){
        //Este método no funciona del todo bien.
        $flag = false;
        $numeroUno = $vendedor;
        $best = $numeroUno;
        $vendedores = Vendedor::all();

        for ($i=0; $i < count($vendedores) ; $i++) { 
            if ($vendedores[$i]->sumaVentas() >= $numeroUno->sumaVentas()) {
                $best = $vendedores[$i];
            }
        }
        return "$best->nombre $best->apellidos";
    }

}
