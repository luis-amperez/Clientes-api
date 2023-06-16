@extends('layouts.layouts')
@section('header')
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}"/>
    <section class="content-header">
        <h1><center>Clientes</center>

        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
          <li class="active">Clientes</li>
        </ol>     
    </section>
@stop
@section('content')
{{-- <a href="" id="btn_div_mes"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i>
</a> --}}


<!-- /.box-header -->

<div class="card" style="width: 100;">
    <img class="card-img-top" src="https://previews.123rf.com/images/faysalfarhan/faysalfarhan1605/faysalfarhan160503901/57240121-clientes-icono-de-grupo-bot%C3%B3n-redondo-de-color-amarillo-brillante.jpg" alt="Card image cap" style="width: 30%;" width="100px" height="200px">
    <div class="card-body">
      <h5 class="card-title">Listado de Clientes <a href="{{route('crearCliente')}}"> <i class="fa fa-plus" aria-hidden="true"></i>
    </a></h5>

        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">nombre</th>
                <th scope="col">correo</th>
                <th scope="col">ACCION</th>
                

                
              </tr>
            </thead>
            <tbody>
                @foreach ($datos as $cliente)
                    <tr>
                        <th scope="row">{{$cliente->id}}</th>
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->correo}}</td>
                        <td><a href="{{ route('eliminarClientes', ['id'=>$cliente->id]) }}"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a></td>
                    </tr>
                       
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
  </div>

</div>

<input type="hidden" name="_token" id="comision_token" value="{{ csrf_token() }}">
@stop
@push('styles')

@endpush
@push('scripts')

@endpush