<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Http\Requests\VendedorRequest;
use App\Http\Requests\VentasRequest;
use App\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ArticuloController;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedores = Vendedor::orderBy('apellidos')->paginate(3);
        return view('vendedores.index', compact('vendedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendedores.create');
    }

    public function verVentas(Vendedor $vendedore){
        $articulos = Articulo::orderBy('id')->get();
        return view('vendedores.verVentas', compact('vendedore', 'articulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendedorRequest $request)
    {
        $datos = $request->validated();
        $vendedor = new Vendedor();
        $vendedor->nombre = ucwords($datos['nombre']);
        $vendedor->apellidos = ucwords($datos['apellidos']);
        $vendedor->edad = $datos['edad'];

        if (isset($datos['perfil']) && $datos['perfil'] != null) {

            $file = $datos['perfil'];
            $nombre = 'perfiles/' . time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));
            $vendedor->perfil = "img/$nombre";
        }

        $vendedor->save();
        return redirect()->route('vendedores.index')->with('mensaje', 'Vendedor añadido correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendedor $vendedore)
    {
        return view('vendedores.detalle', compact('vendedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendedor $vendedore)
    {
        return view('vendedores.edit', compact('vendedore'));
    }

    public function venta(Vendedor $vendedore)
    {
        $articulos = Articulo::orderBy('id')->get();
        return view('vendedores.ventas', compact('vendedore', 'articulos'));
    }

    public function ventaCompletada(Request $request)
    {
        $id = $request->vendedor_id;
        $vendedor = Vendedor::find($id);
        $articulos=$request->articulo_id;
        $vendedor->articulos()->attach($articulos, ['cantidad'=>$request->cantidad, 'fecha_venta'=>$request->fecha_venta]);
        return redirect()->route('vendedores.index')->with('mensaje', 'Ventas guardadas correctamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendedor $vendedore)
    {
        $request->validate([
            'nombre' => ['required'],
            'apellidos' => ['required', 'unique:vendedors,apellidos,' . $vendedore->id],
            'edad' => ['required'],
        ]);

        $vendedore->nombre = ucwords($request->nombre);
        $vendedore->apellidos = ucwords($request->apellidos);
        $vendedore->edad = $request->edad;

        if ($request->has('perfil')) {

            $request->validate([
                'perfil' => ['image'],
            ]);

            $file = $request->file('perfil');
            $nom = 'perfiles/' . time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->put($nom, \File::get($file));
            $imagenOld = $vendedore->perfil;

            if (basename($imagenOld) != "default.jpg") {
                unlink($imagenOld);
            }
            $vendedore->update($request->all());
            $vendedore->update(['perfil' => "img/$nom"]);
        } else {
            $vendedore->update($request->all());
        }
        return redirect()->route('vendedores.index')->with('mensaje', 'Vendedor modificado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendedor $vendedore)
    {
        $perfil = $vendedore->perfil;
        if (basename($perfil) != "default.jpg") {
            unlink($perfil);
        }
        $vendedore->delete();
        return redirect()->route('vendedores.index')->with('mensaje', 'Vendedor borrado correctamente');
    }

}
