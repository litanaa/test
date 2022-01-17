@extends('layout.app')

@section('titulo')

TEST

@endsection

@section('style')

<link rel="stylesheet" href="{{asset('/css/main.css')}}">

@endsection


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Ver Cliente</h3></div>

                <div class="card-body">

                      <div class="container">

                        <h4>Data requerida</h4>

                        
                        <h6>Nombre</h6>
                        <div class="form-group">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{old('nom_cliente', $cliente->nom_cliente)}}"
                          readonly>
                        </div>

                        <br>
                        <h6>Proveedores</h6>
                        <div class="form-group">
                            <ul class="list-group">
                             @foreach ($cliente->proveedores as $proveedor)
                                <li class="list-group-item">
                                    {{$proveedor->nom_proveedor}}
                                </li>
                             @endforeach
                            </ul>
                        </div>

                        <hr>


                        <a class="btn btn-success" href="{{route('clientes.edit', $cliente->id)}}">Editar</a>
                        <a class="btn btn-danger" href="{{route('clientes.index')}}">Volver</a>

                      </div>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection