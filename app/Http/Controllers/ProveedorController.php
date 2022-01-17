<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Cliente;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::orderBy('id')->paginate(3);

      return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::orderBy('nom_cliente')->get();
        return view('proveedores.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:proveedores,nom_proveedor,',
            'cliente' => 'max:50',
        ]);
    
        $proveedor = New Proveedor;
    
        $proveedor->nom_proveedor      = $request->name;
    
        $proveedor->save();
    
        $proveedorCliente = Proveedor::find($proveedor->id);
    
        $proveedorCliente->clientes()->attach($request->cliente);
    
        $proveedorCliente->save();
    
        return redirect()->route('proveedores.index')->with('datos', 'Registro creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::where('id', $id)->firstOrFail();
  
        return view('proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::where('id', $id)->firstOrFail();
        $clientes = Cliente::orderBy('nom_cliente')->get();

        return view('proveedores.edit', compact('proveedor', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required|max:50|unique:proveedores,nom_proveedor,'.$id,
            'cliente' => 'max:50'.$id,
    
          ]);
    
          $proveedor = Proveedor::findOrFail($id);
    
          $proveedor->nom_proveedor      = $request->name;
        
          $proveedor->save();
    
          $proveedorCliente = Proveedor::findOrFail($id);
    
          $proveedorCliente->clientes()->sync($request->cliente);
    
          $proveedorCliente->save();
    
          return redirect()->route('proveedores.show', $proveedor->id)->with('datos', 'Registro editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->clientes()->detach();
        $proveedor->delete();
  
        return redirect()->route('proveedores.index')->with('datos', 'Registro Eliminado correctamente');
    }
}
