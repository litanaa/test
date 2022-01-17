<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Proveedor;
use App\Moneda;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('id')->paginate(3);

      return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::orderBy('nom_proveedor')->get();
  
        return view('clientes.create', compact('proveedores'));
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
            'name' => 'required|max:50|unique:clientes,nom_cliente,',
            'proveedor' => 'max:50',
        ]);
    
        $cliente = New Cliente;
    
        $cliente->nom_cliente      = $request->name;
    
        $cliente->save();
    
        $clienteProveedor = Cliente::find($cliente->id);
    
        $clienteProveedor->proveedores()->attach($request->proveedor);
    
        $clienteProveedor->save();
    
        return redirect()->route('clientes.index')->with('datos', 'Registro creado');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::where('id', $id)->firstOrFail();
  
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::where('id', $id)->firstOrFail();
        $proveedores = Proveedor::orderBy('nom_proveedor')->get();

        return view('clientes.edit', compact('cliente', 'proveedores'));
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

        'name' => 'required|max:50|unique:clientes,nom_cliente,'.$id,
        'proveedor' => 'max:50'.$id,

      ]);

      $cliente = Cliente::findOrFail($id);

      $cliente->nom_cliente      = $request->name;
    
      $cliente->save();

      $clienteProveedor = Cliente::findOrFail($id);

      $clienteProveedor->proveedores()->sync($request->proveedor);

      $clienteProveedor->save();

      return redirect()->route('clientes.show', $cliente->id)->with('datos', 'Registro editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->proveedores()->detach();
        $cliente->delete();
  
        return redirect()->route('clientes.index')->with('datos', 'Registro Eliminado correctamente');
  
    }

    public function mostrarIndex()
    {
        $clientes = Cliente::orderBy('nom_cliente')->get();
  
        return view('monedas.index', compact('clientes'));
    }

    public function mostrarMoneda($id)
    {
        $cliente=Cliente::findOrFail($id);
        $arrayMonedas=[];
        foreach ($cliente->monedas as $moneda) {
            $nombreMoneda = Moneda::findOrFail($moneda->pivot->id_moneda);
            $arrayMonedas[$moneda->id]['moneda'] = $nombreMoneda->tipo_moneda;
            $arrayMonedas[$moneda->id]['valor'] = $moneda->pivot->valor;
        }
        return response(json_encode($arrayMonedas));
    }
}
