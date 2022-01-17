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
                <div class="card-header"><h3>Editar Proveedor</h3></div>

                <div class="card-body">

                    <form action="{{route('proveedores.update', $proveedor->id)}}" method="post">
                      @csrf
                      @method('PUT')
                     

                      <div class="container">

                        <h4>Data requerida</h4>

                        <div class="form-group">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{$proveedor->nom_proveedor}}">
                        </div>

                        <hr>

                        <h3>Lista de Clientes</h3>


                        <label>Cliente</label>
                          
                          <select name="cliente[]" multiple id="cliente" style="width: 100%;">
                                @foreach ($clientes as $cliente)

                                @php
                                 $opcion = "<option value=". $cliente->id .">" . $cliente->nom_cliente . "</option>"
                                @endphp

                                @foreach ($proveedor->clientes as $prov)

                                  @if ( $cliente->id == $prov->pivot->id_cliente )

                                        @php ($opcion = "<option value=". $cliente->id ." selected>" . $cliente->nom_cliente . "</option>") @endphp

                                  @endif

                                @endforeach

                                {!! $opcion !!}
                                @endforeach

                          </select> 

                        <hr>
                        <input class="btn btn-primary" type="submit" value="Guardar">
                        <a class="btn btn-danger" href="{{route('proveedores.index')}}">Volver</a>

                      </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection