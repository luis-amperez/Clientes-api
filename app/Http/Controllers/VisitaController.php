<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\visitas;
use Illuminate\Support\Facades\Redirect;

class VisitaController extends Controller
{
    
    public function visitas(){

       
        if (Session::get('token') != ''){
            $curl = curl_init();
            $url= env("URL_SERVER_VISITAS", "http://127.0.0.1");
           
            curl_setopt_array($curl, array(
              CURLOPT_URL => $url.'visitas',
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
            if (isset($respuesta->data)){
              $datos = $respuesta->data;
          
            }
         
            if($respuesta->status == 200){
              return view ("admin.visitas.visitas",compact('datos'));
            }elseif($respuesta->status == 401){
              $mensaje = "Permiso denegado";         
              Session::flash('mensaje', $mensaje);
              Session::flash('alert', 'error');
              return Redirect::back();
              //return view ("auth.login", compact("response"));
            }else{
              $mensaje = "Permiso denegado";         
              Session::flash('mensaje', $mensaje);
              Session::flash('alert', 'error');
              return Redirect::back();
            }
           
        }else{
          
            return view ("auth.login");
        }
    }

    public function crearVisita()
    {
      $curl = curl_init();
      $url= env("URL_SERVER_CLIENTE", "http://127.0.0.1");

            curl_setopt_array($curl, array(
              CURLOPT_URL => $url.'clientes',
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
            $clientes = $respuesta->data;

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
            $respuesta = json_decode($response);
           
            $tecnicos = $respuesta->data;
       
           
      return view ("admin.visitas.crear_visitas", compact('tecnicos', 'clientes'));


    }


    public function guardarVisita(Request $request)
    {
  
      if (Session::get('token') != ''){
        $curl = curl_init();
        $url= env("URL_SERVER_VISITAS", "http://127.0.0.1");

        
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'crear-visita',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "correo_cliente":"'.$request->correo_cliente.'",
            "id_cliente":"'.$request->id_cliente.'",
            "id_tecnico":"'.$request->id_tecnico.'",
            "fecha_inicio":"'.$request->fecha_inicio.'",
            "fecha_final":"'.$request->fecha_final.'"
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
          return view ("admin.visitas.visitas",compact('datos'));

        }elseif($respuesta->status == 401){
          $mensaje = "Permiso denegado";         
          Session::flash('mensaje', $mensaje);
          Session::flash('alert', 'error');
          return Redirect::back();
          //return view ("auth.login", compact("response"));
        }else{
          $mensaje = "Permiso denegado";         
          Session::flash('mensaje', $mensaje);
          Session::flash('alert', 'error');
          return Redirect::back();
        }
    }else{
    
        return view ("auth.login");
    }

    }


    public function eliminarVisitas($id) {
      if (Session::get('token') != ''){
        $curl = curl_init();
        $url= env("URL_SERVER_VISITAS", "http://127.0.0.1");

       
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'eliminar-visitas/'.$id,
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
          return view ("admin.visitas.visitas",compact('datos'));
        }elseif($respuesta->status ()== 401){
          return view ("auth.login", compact("response"));
        } else{
          $mensaje = "Permiso denegado";         
          Session::flash('mensaje', $mensaje);
          Session::flash('alert', 'error');
          return Redirect::back();
        }
    }else{
        return view ("auth.login");
    }
    }

}


