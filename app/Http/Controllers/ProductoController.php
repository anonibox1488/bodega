<?php

namespace App\Http\Controllers;

use App\producto;
use App\bodegas;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $search = ($request->get('search')) ? $request->get('search') : '' ;

        $productos = producto::nombre($search)->paginate(2);
        $bodegas = bodegas::all();
        return view('producto.index', compact(['productos', 'bodegas']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new producto();
        $producto->nombre = $request->producto;
        $producto->cantidad = $request->cantidad;
        $producto->estado = $request->estado;
        $producto->bodega_id = $request->bodega;
        $producto->observacion = $request->observaciones;
        
        if ($producto->save()) {
            return response()->json('ok', 200);
        }
        return response()->json('No se pudo guardar el registro', 500);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id)
    {
        $producto = producto::findOrFail($id);
        $nuevoEstado = ($producto->estado == 'Activo') ? false : true;
        $producto->estado = $nuevoEstado;
        if ($producto->save()) {
            return response()->json('ok', 200);
        }
        return response()->json('error inesperado', 500);   
    }
}
