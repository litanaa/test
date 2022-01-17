@extends('layout.app')

@section('titulo')

TEST

@endsection

@section('style')

<link rel="stylesheet" href="{{asset('/css/main.css')}}">

@endsection


@section('content')

<div class="row justify-content-center">

        <div class="col-10">
            <div class="card">
                <div class="card-header">
                  <h5>Lista de Clientes</h5>


                </div>

<!-- /.card-header -->

                <div class="card-body table-responsive p-0">

                  <a class="m-2 btn btn-outline-primary" href="{{route('clientes.create')}}">Crear Nuevo <i class="far fa-plus-square"></i></a>


                    <table class="table table-head-fixed">
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Nombre</th>
                          <th colspan="3"></th>
                        </tr>
                      </thead>
                      <tbody>


                          @foreach ($clientes as $cliente)
                            <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nom_cliente}}</td>

                              <td>
                              <a class="btn btn-info" href="{{route('clientes.show', $cliente->id)}}">Ver</a>
                              </td>         
                      
                              <td>
                              <a class="btn btn-success" href="{{route('clientes.edit', $cliente->id)}}">Editar</a>
                              </td>       
                           
                              <td>
                              <form action="{{route('clientes.destroy',$cliente->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                              <button class="btn btn-danger">Borrar</button>
                             </form>
                             </td>
                        
                            </tr>
                            @endforeach



                      </tbody>
                    </table>

                  {{ $clientes->links() }}

                </div>
            </div>
        </div>

</div>
  
@endsection