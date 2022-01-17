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
                  <h5>Lista de Proveedores</h5>


                </div>

<!-- /.card-header -->

                <div class="card-body table-responsive p-0">

                  <a class="m-2 btn btn-outline-primary" href="{{route('proveedores.create')}}">Crear Nuevo <i class="far fa-plus-square"></i></a>


                    <table class="table table-head-fixed">
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Nombre</th>
                          <th colspan="3"></th>
                        </tr>
                      </thead>
                      <tbody>


                          @foreach ($proveedores as $proveedor)
                            <tr>
                            <td>{{$proveedor->id}}</td>
                            <td>{{$proveedor->nom_proveedor}}</td>

                              <td>
                              <a class="btn btn-info" href="{{route('proveedores.show', $proveedor->id)}}">Ver</a>
                              </td>         
                      
                              <td>
                              <a class="btn btn-success" href="{{route('proveedores.edit', $proveedor->id)}}">Editar</a>
                              </td>       
                           
                              <td>
                              <form action="{{route('proveedores.destroy',$proveedor->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                              <button class="btn btn-danger">Borrar</button>
                             </form>
                             </td>
                        
                            </tr>
                            @endforeach



                      </tbody>
                    </table>

                  {{ $proveedores->links() }}

                </div>
            </div>
        </div>

</div>
  
@endsection