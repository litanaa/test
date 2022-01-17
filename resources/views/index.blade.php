@extends('layout.app')

@section('titulo')

TEST

@endsection

@section('style')

<link rel="stylesheet" href="{{asset('/css/main.css')}}">

@endsection


@section('content')

<div class="título">
    <h2 class="py-4 text-center" style="font-family: Helvetica;">

     TEST clientes-proveedores

    </h2>
</div>

<div class="row justify-content-center" id="tarjetasInicio">
  <div class="col-sm-5">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Clientes</h5>
        <p class="card-text">Desde esta sección podrá listar, modificar, eliminar y crear nuevos clientes.</p>
        <a href="{{route('clientes.index')}}" class="btn btn-primary">Ir a clientes</a>
      </div>
    </div>
  </div>
  <div class="col-sm-5">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Proveedores</h5>
        <p class="card-text">Desde esta sección podrá listar, modificar, eliminar y crear nuevos proveedores.</p>
        <a href="{{route('proveedores.index')}}" class="btn btn-primary">Ir a proveedores</a>
      </div>
    </div>
  </div>
</div>
  
@endsection