<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Articulo;

class Categoria extends Model
{
    protected $fillable = ['nombre'];

    //Una categoria puede tener muchos articulos (relacion 1:N)

    public function articulos(){
        return $this->hasMany(Articulo::class);
    }

}
