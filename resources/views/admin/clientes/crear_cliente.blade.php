@extends('layouts.layouts')
@section('header')
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}"/>
    <section class="content-header">
        <h1><center>Clientes</center>

        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
          <li class="active">Crear Cliente</li>
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
      <h5 class="card-title">Creacion de Clientes <i class="fa fa-plus" aria-hidden="true"></i>
    </a></h5>
    <form action="{{ route('guardarCliente') }}" method="POST">
    <input type="hidden" name="_token" id="bono_token" value="{{ csrf_token() }}">
    
        <div class="mb-3">
          <label for="nombre" class="form-label">nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre">
          
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">correo</label>
          <input type="text" class="form-control" id="correo" name="correo">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
        
    </div>
  </div>

</div>

<input type="hidden" name="_token" id="comision_token" value="{{ csrf_token() }}">
@stop
@push('styles')

@endpush
@push('scripts')

@endpush