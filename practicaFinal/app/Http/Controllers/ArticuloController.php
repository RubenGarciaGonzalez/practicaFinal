<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\ArticuloRequest;
use Illuminate\Support\Facades\Storage;


class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $miCategoria = $request->get('categoria_id');

        $articulos = Articulo::orderBy('id')
        ->categoria_id($miCategoria)
        ->paginate(3);
        return view('articulos.index', compact('articulos', 'categorias', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('articulos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloRequest $request)
    {
        $datos = $request->validated();
        $articulo = new Articulo();
        $articulo->nombre = \ucwords($datos['nombre']);
        $articulo->precio = $datos['precio'];
        $articulo->stock = $datos['stock'];
        $articulo->detalles = $datos['detalles'];
        if ($datos['categoria_id']!="%") {
            $articulo->categoria_id=$datos['categoria_id'];
        }

        if (isset($datos['foto']) && $datos['foto']!=null) {

            $file = $datos['foto'];
            $nombre = 'articulos/'.time().'_'.$file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));
            $articulo->foto="img/$nombre";
        }

        $articulo->save();
        return redirect()->route('articulos.index')->with('mensaje', 'Articulo Creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('articulos.detalle', \compact('articulo', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('articulos.edit', compact('articulo', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'nombre'=>['required', 'unique:articulos,nombre,'.$articulo->id],
            'stock'=>['required'],
            'precio'=>['required'],
            'categoria_id'=>['nullable'],
            'detalles'=>['required']
        ]);

        $articulo->nombre=ucwords($request->nombre);
        $articulo->stock=$request->stock;
        $articulo->precio=$request->precio;
        $articulo->detalles=$request->detalles;
        $articulo->categoria_id=$request->categoria_id;

        if ($request->has('foto')) {

            $request->validate=([
                'foto'=>['image']
            ]);

            $file = $request->file('foto');
            $nom = 'articulos/'.time().'_'.$file->getClientOriginalName();
            //Guardamos el fichero en public
            Storage::disk('public')->put($nom, \File::get($file));
            //Le damos a alumno el nombre que le hemos puesto al fichero
            $imagenOld = $articulo->foto;
            if (basename($imagenOld)!="default.jpg") {
                unlink($imagenOld);
            }
            $articulo->update($request->all());
            $articulo->update(['foto'=>"img/$nom"]);
        }else{
            $articulo->update($request->all());
        }
            //Guardamos el fichero
            return redirect()->route('articulos.index')->with('mensaje', 'Articulo Modificado!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $foto = $articulo->foto;
        if (basename($foto)!="default.jpg") {
            unlink($foto);
        }
        $articulo->delete();
        return redirect()->route('articulos.index')->with('mensaje', 'Articulo borrado!!');
    }
}
