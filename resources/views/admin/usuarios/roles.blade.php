@extends('layouts.layouts')
@section('header')
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}"/>
    <section class="content-header">
        <h1><center>  Roles</center>

        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
          <li class="active">Roles</li>
        </ol>     
    </section>
@stop
@section('content')
{{-- <a href="" id="btn_div_mes"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i>
</a> --}}


<!-- /colspan="2"-->

<div class="card" style="width: 100;">
    <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/2211/2211615.png" alt="Card image cap" style="width: 30%;" width="100px" height="200px">
    <div class="card-body">
      <h5 class="card-title">Listado de Roles <a href="{{route('crearRole')}}"><i class="fa fa-plus" aria-hidden="true"></i>
      </a></h5>
      <h5 class="card-title">Asignar Usuario a Rol <a href="{{route('asignarRol')}}"><i class="fa fa-plus" aria-hidden="true"></i>
      </a></h5>

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">ACCION</th>
            
          </tr>
        </thead>
        <tbody>
         @foreach ($datos as $rol)
         <tr>
            <th scope="row">{{$rol->id}}</th>
            <td>{{$rol->name}}</td>
            <td>
              @if ($rol->id != 1)
              <div class="col-lg-4 lg-offset-4">
                 <a href="{{ route('eliminarRoles', ['id'=>$rol->id]) }}"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a></div>
              @endif
            </td>
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
