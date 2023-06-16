@extends('layouts.layouts')
@section('header')
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}"/>
    <section class="content-header">
        <h1><center>Permisos</center>

        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
          <li class="active">Permisos</li>
        </ol>     
    </section>
@stop
@section('content')
{{-- <a href="" id="btn_div_mes"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i>
</a> --}}


<!-- /.box-header -->

<div class="card" style="width: 100;">
    <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/2172/2172839.png" alt="Card image cap" style="width: 30%;" width="100px" height="200px">
    <div class="card-body">
      <h5 class="card-title">Listado de Permisos <a href="{{route('crearPermiso')}}"><i class="fa fa-plus" aria-hidden="true"></i>
      </a></h5>
      <h5 class="card-title">Asignar Permisos a Rol <a href="{{route('asignarPermiso')}}"><i class="fa fa-plus" aria-hidden="true"></i>
      </a></h5>

        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">PERMISOS</th>
                <th scope="col">ACCION</th>
                
              </tr>
            </thead>
            <tbody>
                @foreach ($datos as $permiso)
                    <tr>
                        <th scope="row">{{$permiso->id}}</th>
                        <td>{{$permiso->name}}</td>
                        <td><a href="{{ route('eliminarPermisos', ['id'=>$permiso->id]) }}"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a></td>
                       
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
