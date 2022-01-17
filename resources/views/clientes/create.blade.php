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
                <div class="card-header"><h3>Crear Cliente</h3></div>

                <div class="card-body">

                    <form action="{{route('clientes.store')}}" method="post">
                      @csrf

                      <div class="container">

                        <h4>Data requerida</h4>

                        <div class="form-group">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{old('name')}}">
                        </div>

                        <hr>

                        <h3>Lista de Proveedores</h3>


                        <label>Proveedor</label>
                          <select name="proveedor[]" multiple id="proveedor" style="width: 100%;">
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{$proveedor->id}}">{{$proveedor->nom_proveedor}}</option>
                                @endforeach
                          </select>

                        <hr>
                        <input class="btn btn-primary" type="submit" value="Guardar">

                      </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection