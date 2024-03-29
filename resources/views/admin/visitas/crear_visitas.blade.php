@extends('layouts.layouts')
@section('header')
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}"/>
    <section class="content-header">
        <h1><center>Visitas</center>

        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
          <li class="active">Crear Visita</li>
        </ol>     
    </section>
@stop
@section('content')
{{-- <a href="" id="btn_div_mes"><i class="fa fa-caret-square-o-up" aria-hidden="true"></i>
</a> --}}


<!-- /.box-header -->

<div class="card" style="width: 100;">
    <img class="card-img-top" src="https://w7.pngwing.com/pngs/443/556/png-transparent-computer-icons-symbol-business-card-format-miscellaneous-text-visiting-card.png" alt="Card image cap" style="width: 30%;" width="100px" height="200px">
    <div class="card-body">
      <h5 class="card-title">Creacion de Visitas <i class="fa fa-plus" aria-hidden="true"></i>
    </a></h5>

    <form action="{{ route('guardarVisita') }}" method="POST">
    <input type="hidden" name="_token" id="bono_token" value="{{ csrf_token() }}">
        <div class="mb-3">
          <label for="correo_cliente" class="form-label">Correo Cliente</label>
          <input type="email" class="form-control" id="nombre" name="correo_cliente" required>
        </div>

        <div class="mb-3">
          <label for="id_cliente" class="form-label">cliente</label>
          <select class="form-select" aria-label="Default select example" name="id_cliente">
            <option selected>Eliga un cliente</option>
            @foreach ($clientes as $cliente)
            <option value={{$cliente->id}}>{{$cliente->nombre}}</option> 
            @endforeach
           
            
          </select>
          {{-- <input type="text" class="form-control" id="correo" name="id_cliente"> --}}
        </div>

        <div class="mb-3">
        <label for="id_tecnico" class="form-label">tecnico</label>
        <select class="form-select" aria-label="Default select example" name="id_tecnico">
          <option selected>Eliga un tecnico</option>
          @foreach ($tecnicos as $tecnico)
          <option value={{$tecnico->id}}>{{$tecnico->name}}</option> 
          @endforeach
        </select>
        </div>

        <div class="mb-3">
        <label for="fecha_inicio" class="form-label">fecha_inicio</label>
        <input type="date" class="form-control" id="correo" name="fecha_inicio">
        </div>

        <div class="mb-3">
        <label for="fecha_final" class="form-label">fecha_final</label>
        <input type="date" class="form-control" id="correo" name="fecha_final">
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