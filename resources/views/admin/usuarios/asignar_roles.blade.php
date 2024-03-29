@extends('layouts.layouts')
@section('header')
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}"/>
    <section class="content-header">
        <h1><center>Roles</center>

        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('dashboard')}}"><i class="fa fa-tachometer-alt"></i> Inicio</a></li>
          <li class="active">Asignar Roles</li>
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
      <h5 class="card-title">Asignacion de Roles <i class="fa fa-plus" aria-hidden="true"></i>
    </a></h5>

    <form action="{{ route('guardarRoleasig') }}" method="POST">
    <input type="hidden" name="_token" id="bono_token" value="{{ csrf_token() }}">
        
    
    
    <div class="mb-3">
        <label for="model_id" class="form-label">Id del Usuario</label>
        <select class="form-select" aria-label="Default select example" name="model_id">
          <option selected>Eliga un usuario</option>
          @foreach ($users as $user)
          <option value={{$user->id}}>{{$user->name}}</option> 
          @endforeach

        </select>
      </div>
    
    <div class="mb-3"> 
          <label for="role_id" class="form-label">Id del Role</label>
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