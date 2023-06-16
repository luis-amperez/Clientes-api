@extends('layouts.layouts')
@section('header')
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}"/>
    <section class="content-header">
        <h1><center> Usuarios </centUer>

        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
          <li class="active">Usuarios</li>
        </ol>     
    </section>
@stop
@section('content')
{{-- <a href="" id="btn_div_mes"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i>
</a> --}}


<!-- /.box-header -->

<div class="card" style="width: 100;">
    <img class="card-img-top" src="https://img.freepik.com/vector-premium/icono-circulo-usuario-anonimo-ilustracion-vector-estilo-plano-sombra_520826-1931.jpg" alt="Card image cap" style="width: 30%;" width="100px" height="200px">
    
    <div class="card-body">
      <h5 class="card-title">Listado de usuarios <a href="{{route('crearUsuario')}}"> <i class="fa fa-plus" aria-hidden="true"></i>
      </a></h5>

        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">CORREO</th>
                <th scope="col">ACCION</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($datos as $usuario)
                    <tr>
                        <th scope="row">{{$usuario->id}}</th>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td><a href="{{ route('eliminarUsuario', ['id'=>$usuario->id]) }}"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a></td>
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
