<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function login(Request $request)
    { 

      if (Session::get('token') != ''){
        return view ("admin.dashboard");
      }
        $url= env("URL_SERVER_API", "http://127.0.0.1");
        $response=Http::post($url."login", [
            "email"=>$request->email,
            "password"=>$request->password,
        ]);
        //dd($response->status());
        if($response->status()== 404)
      {
        return view ("auth.login",compact("response"));
        
      }elseif($response->status()== 200){
        Session::put('token',$response['msg']);
        cookie('token',$response['msg']);
        return Redirect ("/");
        return view ("admin.dashboard");

      }elseif($response->status()== 401){

        return view ("auth.login", compact("response"));

      }
        $data= $response->json();
        
    }



    public function logout(Request $request)
    { 

      
      $curl = curl_init();
      $url= env("URL_SERVER_API", "http://127.0.0.1");

     
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url.'logout/',
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
      
      Session::pull('token');
      return redirect('/');
     
    }

}
