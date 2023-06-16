<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

public function chektoken(){
 
    $curl = curl_init();
    $url= env("URL_SERVER_API", "http://127.0.0.1");

   
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url.'chektoken/',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer '.Session::get('token')
      ),
    ));
   
    $response = curl_exec($curl);
    $respuesta = json_decode($response);
    
    if($respuesta->status != 200){
    Session::pull('token');
    return redirect('/');
    }
}


}
