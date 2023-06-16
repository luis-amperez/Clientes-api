<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    // }
    public function index()
    {
        $url= env("URL_SERVER_API", "http://127.0.0.1");

        $response=Http::get($url."users");
        $data= $response->json();
        
      if($response->status()== 401)
      {
        return view ("auth.login");
      }else
      {
        return view ("admin.dashboard");
      } 

    }
}
