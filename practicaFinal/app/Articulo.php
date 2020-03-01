<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;

class Articulo extends Model
{
    protected $fillable =['nombre', 'stock', 'precio', 'foto', 'detalles', 'categoria_id'];

    //Un artículo tendrá una única categoria (relación 1:N)

    public function categoria(){
        return $this->belongsTo(Categoria::class)
            ->withDefault(['nombre'=>'Sin categoria']);
    }

    public function vendedors(){
        return $this->belongsToMany('App\Vendedor')->withPivot('fecha_venta')->withTimestamps();
    }

    public function scopeCategoria_id($query, $v){
        if($v=='%'){
            return $query->where('categoria_id','like' ,$v)
            ->orWhereNull('categoria_id');
        }
        if($v==-1){
            return $query->whereNull('categoria_id');
        }
        if(!isset($v)){
            return $query->where('categoria_id','like' ,'%')
            ->orWhereNull('categoria_id');
        }
        return $query->where('categoria_id', $v);
    }

}
