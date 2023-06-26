<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    public function clientes(){

        
        if (Session::get('token') != ''){
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
            $datos = $respuesta->data;
            if($respuesta->status == 200){
              return view ("admin.clientes.clientes",compact('datos'));
            }elseif($respuesta->status()== 401){
              return view ("auth.login", compact("response"));
            }
        }else{
            return view ("auth.login");
        }
    }

    public function crearCliente()
    {
      return view ("admin.clientes.crear_cliente");


    }


    public function guardarCliente(Request $request)
    {
      if (Session::get('token') != ''){
        $curl = curl_init();
        $url= env("URL_SERVER_CLIENTE", "http://127.0.0.1");

        
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'crear-clientes',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "nombre":"'.$request->nombre.'",
            "correo":"'.$request->correo.'"
            
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.Session::get('token')
          ),
        ));
        $response = curl_exec($curl);

        $respuesta = json_decode($response);
        $datos = $respuesta->data;
        if($respuesta->status == 200){
          return Redirect ("/clientes");
          return view ("admin.clientes.clientes",compact('datos'));
        }elseif($respuesta->status()== 401){
          return view ("auth.login", compact("response"));
        }
    }else{
        return view ("auth.login");
    }

    }


    public function eliminarClientes($id) {
      if (Session::get('token') != ''){
        $curl = curl_init();
        $url= env("URL_SERVER_CLIENTE", "http://127.0.0.1");

       
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url.'eliminar-clientes/'.$id,
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
         
       
        if($respuesta->status == 200){
          return Redirect ("/clientes");
          return view ("admin.clientes.clientes",compact('datos'));
        }elseif($respuesta->status()== 401){
          return view ("auth.login", compact("response"));
        }
    }else{
        return view ("auth.login");
    }
    }

}

}


