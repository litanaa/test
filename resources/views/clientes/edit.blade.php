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
                <div class="card-header"><h3>Editar Cliente</h3></div>

                <div class="card-body">

                    <form action="{{route('clientes.update', $cliente->id)}}" method="post">
                      @csrf
                      @method('PUT')
                     

                      <div class="container">

                        <h4>Data requerida</h4>

                        <div class="form-group">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{$cliente->nom_cliente}}">
                        </div>

                        <hr>

                        <h3>Lista de Proveedores</h3>


                        <label>Proveedor</label>
                        
                          <select name="proveedor[]" multiple id="proveedor" style="width: 100%;">
                                @foreach ($proveedores as $proveedor)

                                @php
                                 $opcion = "<option value=". $proveedor->id .">" . $proveedor->nom_proveedor . "</option>"
                                @endphp

                                @foreach ($cliente->proveedores as $cli)

                                  @if ( $proveedor->id == $cli->pivot->id_proveedor )

                                        @php ($opcion = "<option value=". $proveedor->id ." selected>" . $proveedor->nom_proveedor . "</option>") @endphp

                                  @endif

                                @endforeach

                                {!! $opcion !!}
                                @endforeach

                                {{-- Muestro la opcion que corresponda --}}
                                  

                          </select>                

                        <hr>
                        <input class="btn btn-primary" type="submit" value="Guardar">
                        <a class="btn btn-danger" href="{{route('clientes.index')}}">Volver</a>

                      </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection