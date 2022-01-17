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
                <div class="card-header"><h3>Crear Proveedor</h3></div>

                <div class="card-body">

                    <form action="{{route('proveedores.store')}}" method="post">
                      @csrf

                      <div class="container">

                        <h4>Data requerida</h4>

                        <div class="form-group">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{old('name')}}">
                        </div>

                        <hr>

                        <h3>Lista de Clientes</h3>
                        

                        <label>Cliente</label>
                          <select name="cliente[]" multiple id="cliente"style="width: 100%;">
                                @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nom_cliente}}</option>
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