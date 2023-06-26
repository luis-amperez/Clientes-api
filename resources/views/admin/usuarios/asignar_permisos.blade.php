@extends('layouts.layouts')
@section('header')
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}"/>
    <section class="content-header">
        <h1><center>Permisos</center>

        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
          <li class="active">Asignar Permiso</li>
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
      <h5 class="card-title">Asignacion de Permisos <i class="fa fa-plus" aria-hidden="true"></i>
    </a></h5>

    <form action="{{ route('guardarAsignacion') }}" method="POST">
    <input type="hidden" name="_token" id="bono_token" value="{{ csrf_token() }}">
        
    <div class="mb-3">
          <label for="permission_id" class="form-label">Permiso</label>
          <select class="form-select" aria-label="Default select example" name="permission_id">
            <option selected>Eliga un Permiso</option>
            @foreach ($permisos as $permiso)
            <option value={{$permiso->id}}>{{$permiso->name}}</option> 
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="role_id" class="form-label">Rol</label>
          <select class="form-select" aria-label="Default select example" name="role_id">
            <option selected>Eliga un rol</option>
            @foreach ($roles as $rol)
            <option value={{$rol->id}}>{{$rol->name}}</option> 
            @endforeach
  
          </select>
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