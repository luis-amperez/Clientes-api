<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use stdClass;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;


class ConfigController extends Controller
{

    
    public function index(Request $request){
        Controller::chektoken();
       
      if (Session::get('token') != ''){
            $curl = curl_init();
            $url= env("URL_SERVER_API", "http://127.0.0.1");

            curl_setopt_array($curl, array(
              CURLOPT_URL => $url.'users',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.Session::get('token')
              ),
            ));
            
            $response = curl_exec($curl);
            
            // $headers = [
            //     'Authorization' => 'Bearer 34|Xd0ZvqaQ0l6tiSwPxmp3S0Rykww1YIp5TjYXrAx9',
            // ];
            // $url= env("URL_SERVER_API", "http://127.0.0.1");
            // $response=Http::get($url."users", [
            //     'headers' => $headers
            // ]);
            // $client = new Client();
            // $headers = [
            //     'Authorization' => 'Bearer 34|Xd0ZvqaQ0l6tiSwPxmp3S0Rykww1YIp5TjYXrAx9'
            // ];
            // $request = new Request('GET', '192.168.1.22:8080/configuraciones/api/users', $headers);
            // $res = $client->sendAsync($request)->wait();
            // dd($res);
            $respuesta = json_decode($response);
            $datos = $respuesta->data;
            if($respuesta->status == 200){
              return view ("admin.usuarios.index",compact('datos'));
            }elseif($respuesta->status()== 401){
              return view ("auth.login", compact("response"));
            }
        }else{
            return view ("auth.login");
        }
    }

    public function roles(){
        
        if (Session::get('token') != ''){
            $curl = curl_init();
            $url= env("URL_SERVER_API", "http://127.0.0.1");

            curl_setopt_array($curl, array(
              CURLOPT_URL => $url.'roles',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.Session::get('token')
              ),
            ));
            
            $response = curl_exec($curl);
    
            $respuesta = json_decode($response);
            $datos = $respuesta->data;
            if($respuesta->status == 200){
              return view ("admin.usuarios.roles",compact('datos'));
            }elseif($respuesta->status()== 401){
              return view ("auth.login", compact("response"));
            }
        }else{
            return view ("auth.login");
        }
    }

    public function crearRole()
    {
      return view ("admin.usuarios.crear_roles");


    }


    public function guardarRol(Request $request)
    {
      if (Session::get('token') != ''){
        $curl = curl_init();
        $url= env("URL_SERVER_API", "http://127.0.0.1");

       
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'crear-roles',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            
            "name":"'.$request->name.'"
            
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.Session::get('token')
          ),
        ));
        
        $response = curl_exec($curl);
        $respuesta = json_decode($response);
        if (isset($respuesta->data)){
          $datos = $respuesta->data;
          
        }
        
        if($respuesta->status == 200){
          return view ("admin.usuarios.roles",compact('datos'));
        }elseif($respuesta->status()== 401){
          return view ("auth.login", compact("response"));
        }
    }else{
        return view ("auth.login");
    }

  }

    public function permisos()
    {
        
        if (Session::get('token') != ''){
            $curl = curl_init();
            $url= env("URL_SERVER_API", "http://127.0.0.1");

            curl_setopt_array($curl, array(
              CURLOPT_URL => $url.'permisos',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.Session::get('token')
              ),
            ));
            
            $response = curl_exec($curl);
    
            $respuesta = json_decode($response);
            $datos = $respuesta->data;
            if($respuesta->status == 200){
              return view ("admin.usuarios.permisos",compact('datos'));
            }elseif($respuesta->status()== 401){
              return view ("auth.login", compact("response"));
            }
        }else{
            return view ("auth.login");
        }
    }

    public function crearUsuario()
    {
      return view ("admin.usuarios.crear_index");


    }


    public function guardarUsuario(Request $request)
    {
      if (Session::get('token') != ''){
        $curl = curl_init();
        $url= env("URL_SERVER_API", "http://127.0.0.1");

       
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'crear-usuario',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "name":"'.$request->name.'",
            "email":"'.$request->email.'",
            "password":"'.$request->password.'"
         
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.Session::get('token')
          ),
        ));
        $response = curl_exec($curl);
        $respuesta = json_decode($response);
        if (isset($respuesta->data)){
          $datos = $respuesta->data;
          
        }
        
        if($respuesta->status == 200){
          return view ("admin.usuarios.index",compact('datos'));
        }elseif($respuesta->status()== 401){
          return view ("auth.login", compact("response"));
        }
    }else{
        return view ("auth.login");
    }

    }

//----------------------------------------------------------------------------------------------------------------------------

    public function eliminarUsuario($id) {
      if (Session::get('token') != ''){
        $curl = curl_init();
        $url= env("URL_SERVER_API", "http://127.0.0.1");

       
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'eliminar-usuario/'.$id,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.Session::get('token')
          ),
        ));
        $response = curl_exec($curl);
        $respuesta = json_decode($response);
        if (isset($respuesta->data)){
          $datos = $respuesta->data;
          
        }
        
        if($respuesta->status == 200){
          return view ("admin.usuarios.index",compact('datos'));
        }elseif($respuesta->status()== 401){
          return view ("auth.login", compact("response"));
        }
    }else{
        return view ("auth.login");
    }
    }


    public function eliminarRoles($id) {
      if (Session::get('token') != ''){
        $curl = curl_init();
        $url= env("URL_SERVER_API", "http://127.0.0.1");

       
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'eliminar-roles/'.$id,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.Session::get('token')
          ),
        ));
        $response = curl_exec($curl);
        $respuesta = json_decode($response);
        if (isset($respuesta->data)){
          $datos = $respuesta->data;
          
        }
        
        if($respuesta->status == 200){
          return view ("admin.usuarios.roles",compact('datos'));
        }elseif($respuesta->status()== 401){
          return view ("auth.login", compact("response"));
        }
    }else{
        return view ("auth.login");
    }
    }



    public function eliminarPermisos($id) {
      //dd(app_path().'/login');
      if (Session::get('token') != ''){
        $curl = curl_init();
        $url= env("URL_SERVER_API", "http://127.0.0.1");

       
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'eliminar-permisos/'.$id,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.Session::get('token')
          ),
        ));
        $response = curl_exec($curl);
        $respuesta = json_decode($response);
        if (isset($respuesta->data)){
          $datos = $respuesta->data;
          
        }
        
        if($respuesta->status == 200){
          //return route('permisos');
          return view ("admin.usuarios.permisos",compact('datos'));
        }elseif($respuesta->status()== 401){
          return view ("auth.login", compact("response"));
        }
    }else{
        return view ("auth.login");
    }
    }


//--------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function crearPermiso()
    {
      return view ("admin.usuarios.crear_permisos");


    }


    public function guardarPermiso(Request $request)
    {
      if (Session::get('token') != ''){
        $curl = curl_init();
        $url= env("URL_SERVER_API", "http://127.0.0.1");

       
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'crear-permiso',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            
            "name":"'.$request->name.'"
           
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.Session::get('token')
          ),
        ));
        
        $response = curl_exec($curl);
        $respuesta = json_decode($response);
        if (isset($respuesta->data)){
          $datos = $respuesta->data;
          
        }
        
        if($respuesta->status == 200){
          return view ("admin.usuarios.permisos",compact('datos'));
        }elseif($respuesta->status()== 401){
          return view ("auth.login", compact("response"));
        }
    }else{
        return view ("auth.login");
    }

  }


  public function asignarPermiso()
    {
      return view ("admin.usuarios.asignar_permisos");


    }


    public function guardarAsignacion(Request $request)
    {
      if (Session::get('token') != ''){
        $curl = curl_init();
        $url= env("URL_SERVER_API", "http://127.0.0.1");

       
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'asignar-permisos',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            
            "permission_id":"'.$request->permission_id.'",
            "role_id":"'.$request->role_id.'"
            
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.Session::get('token')
          ),
        ));
        
        $response = curl_exec($curl);
        $respuesta = json_decode($response);
        if (isset($respuesta->data)){
          $datos = $respuesta->data;
     
        }
       
        if($respuesta->status == 200){
          return view ("admin.usuarios.permisos",compact('datos'));
        }elseif($respuesta->status()== 401){
          return view ("auth.login", compact("response"));
        }
    }else{
        return view ("auth.login");
    }

  }

  public function asignarRol()
  {
    return view ("admin.usuarios.asignar_roles");

  }

  public function guardarRoleasig(Request $request)
  {
    if (Session::get('token') != ''){
      $curl = curl_init();
      $url= env("URL_SERVER_API", "http://127.0.0.1");

     
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'asignar-roles',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{

          "model_id":"'.$request->model_id.'", 
          "role_id":"'.$request->role_id.'"
      
      }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Authorization: Bearer '.Session::get('token')
        ),
      ));
      
      $response = curl_exec($curl);
      $respuesta = json_decode($response);
      if (isset($respuesta->data)){
        $datos = $respuesta->data;
     
      }
     
      if($respuesta->status == 200){
        return view ("admin.usuarios.roles",compact('datos'));
      }elseif($respuesta->status()== 401){
        return view ("auth.login", compact("response"));
      }
  }else{
      return view ("auth.login");
  }

}

}
