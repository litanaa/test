@extends('layout.app')

@section('titulo')

TEST

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

                        <label>Cliente</label>
                        <select name="cliente" id="cliente" style="width: 100%;">
                        <option value="">--Seleccione un cliente--</option></option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nom_cliente}}</option>
                                @endforeach
                        </select>
                        <br>
                        <hr>

                        <label>Moneda</label>
                            <div id='respuesta'>
                             
                            </div>
                        <hr>
                        
                        <a class="btn btn-danger" href="/">Volver</a>

                      </div>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>


    $(document).ready(function(){

        $("#cliente").change(function(){
        var cliente = $(this).val();

        $.ajax({
            url:'/moneda/'+cliente,
            method:'GET',
            dataType: 'JSON',
            data:{
                id:cliente
            }
        }).done(function(res){
            console.log(res)
            if (res != '') {
                var ul = '<ul class="absoluteUlSelector list-group">';
                $.each(res,function(imprimirMoned, moned){
                ul += '<li class="list-group-item"><span>'+moned.moneda+'</span><span>:'+moned.valor+'</span></li>';
            });

                ul += '</ul>';

                $("#respuesta").html(ul);
            }else{
                $("#respuesta").html('<li class="list-group-item"><span>No hay monedas cargadas</span></li>');
            }
                   
                   

          
        })
    })
})
</script>