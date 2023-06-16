@extends('layouts.layouts')
@section('header')
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}"/>
    <section class="content-header">
        <h1><center>Visitas</center>

        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
          <li class="active">Visitas</li>
        </ol>     
    </section>
@stop
@section('content')
{{-- <a href="" id="btn_div_mes"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i>
</a> --}}


<!-- /.box-header -->

<div class="card" style="width: 100;">
    <img class="card-img-top" src="https://png.pngtree.com/png-vector/20190226/ourlarge/pngtree-vector-business-card-icon-png-image_705741.jpg" alt="Card image cap" style="width: 30%;" width="100px" height="200px">
    <div class="card-body">
      <h5 class="card-title">Listado de Visitas <a href="{{route('crearVisita')}}"> <i class="fa fa-plus" aria-hidden="true"></i>
      </a></h5>

        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">correo_cliente</th>
                <th scope="col">nombre_cliente</th>
                <th scope="col">nombre_tecnico</th>
                <th scope="col">fecha_inicio</th>
                <th scope="col">fecha_final</th>
                <th scope="col">ACCION</th>
                
     
                
              </tr>
            </thead>
            <tbody>
                @foreach ($datos as $visita)
                    <tr>
                        <th scope="row">{{$visita->id}}</th>
                        <td>{{$visita->correo_cliente}}</td>
                        <td>{{$visita->nombre_cliente}}</td>
                        <td>{{$visita->nombre_tecnico}}</td>
                        <td>{{$visita->fecha_inicio}}</td>
                        <td>{{$visita->fecha_final}}</td>
                        <td><a href="{{ route('eliminarVisitas', ['id'=>$visita->id]) }}"> <i class="fa fa-trash-o" aria-hidden="true"></i> </a></td>
                       
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