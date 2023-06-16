<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
@yield('styles')

<header class="hero bg-primary text-white text-center py-3">
  <div class="container">
    <h1 class="display-4">Bienvenido a Empresa SkyNet S. A</h1>
    <p class="lead">Ofrecemos soluciones tecnológicas innovadoras para tu negocio</p>
    <a href="#" class="btn btn-light btn-lg">Descubre más</a>
  </div>
</header>

</head>
<body style="">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Menu</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Configuraciones
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('index') }}">Usuarios</a></li>
                      <li><a class="dropdown-item" href="{{ route('roles') }}">Roles</a></li>
                      <li><a class="dropdown-item" href="{{ route('permisos') }}">Permisos</a></li>
                      
                      {{-- <li><a class="dropdown-item" href="#">Personas</a></li> --}}
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Clientes
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('cliente') }}">Clientes</a></li>
                      
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Visitas
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Reportes</a></li>
                      <li><a class="dropdown-item" href="{{ route('visitas') }}">Listar Visitas</a></li>
                    </ul>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                {{--<a href="{{ route('logout') }}">Logout</a>--}}
                <button class="btn btn-outline-success" src="https://previews.123rf.com/images/faysalfarhan/faysalfarhan1206/faysalfarhan120600025/14516135-icono-para-cerrar-sesi%C3%B3n-en-el-bot%C3%B3n-redondo-rojo-brillante.jpg" style= "background-color:skyblue; border-color:black;" type="submit"><a href="{{ route('logout') }} ">Cerrar Sesion</a></button>
                
              </div>
            </div>
          </nav>
    
                    
    @yield('header')

    @yield('content')
    </div>

  
    @yield('script')
</body>
</html>