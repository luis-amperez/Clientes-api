<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {

    //Session::flush();
    if (Session::get('token') != ''){
        return view ("admin.dashboard");
    }else{
        return view ("auth.login");
    }
})->name('dashboard');
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/users', [App\Http\Controllers\ConfigController::class, 'index'])->name('index');
Route::get('/crear-usuario', [App\Http\Controllers\ConfigController::class, 'crearUsuario'])->name('crearUsuario');
Route::post('/guardar-usuario', [App\Http\Controllers\ConfigController::class, 'guardarUsuario'])->name('guardarUsuario');
Route::get('/eliminar-usuario/{id}', [App\Http\Controllers\ConfigController::class, 'eliminarUsuario'])->name('eliminarUsuario');

Route::get('/roles', [App\Http\Controllers\ConfigController::class, 'roles'])->name('roles');
Route::get('/crear-roles', [App\Http\Controllers\ConfigController::class, 'crearRole'])->name('crearRole');
Route::post('/guardar-roles', [App\Http\Controllers\ConfigController::class, 'guardarRol'])->name('guardarRol');
Route::get('/eliminar-roles/{id}', [App\Http\Controllers\ConfigController::class, 'eliminarRoles'])->name('eliminarRoles');
Route::get('/asignar-roles', [App\Http\Controllers\ConfigController::class, 'asignarRol'])->name('asignarRol');
Route::post('/guardar-asignacionrol', [App\Http\Controllers\ConfigController::class, 'guardarRoleasig'])->name('guardarRoleasig');

Route::get('/permisos', [App\Http\Controllers\ConfigController::class, 'permisos'])->name('permisos');
Route::get('/crear-permiso', [App\Http\Controllers\ConfigController::class, 'crearPermiso'])->name('crearPermiso');
Route::post('/guardar-permiso', [App\Http\Controllers\ConfigController::class, 'guardarPermiso'])->name('guardarPermiso');
Route::get('/asignar-permisos', [App\Http\Controllers\ConfigController::class, 'asignarPermiso'])->name('asignarPermiso');
Route::post('/guardar-asignacion', [App\Http\Controllers\ConfigController::class, 'guardarAsignacion'])->name('guardarAsignacion');
Route::get('/eliminar-permisos/{id}', [App\Http\Controllers\ConfigController::class, 'eliminarPermisos'])->name('eliminarPermisos');

Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'clientes'])->name('cliente');
Route::get('/crear-cliente', [App\Http\Controllers\ClienteController::class, 'crearCliente'])->name('crearCliente');
Route::post('/guardar-cliente', [App\Http\Controllers\ClienteController::class, 'guardarCliente'])->name('guardarCliente');
Route::get('/eliminar-clientes/{id}', [App\Http\Controllers\ClienteController::class, 'eliminarClientes'])->name('eliminarClientes');


Route::get('/visitas', [App\Http\Controllers\VisitaController::class, 'visitas'])->name('visitas'); 
Route::get('/crear-visita', [App\Http\Controllers\VisitaController::class, 'crearVisita'])->name('crearVisita');
Route::post('/guardar-visita', [App\Http\Controllers\VisitaController::class, 'guardarVisita'])->name('guardarVisita');
Route::get('/eliminar-visitas/{id}', [App\Http\Controllers\VisitaController::class, 'eliminarVisitas'])->name('eliminarVisitas');


