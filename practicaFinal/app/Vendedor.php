<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
