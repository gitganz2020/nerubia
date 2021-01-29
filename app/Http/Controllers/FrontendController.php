<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class FrontendController extends Controller
{
    public function index(){
        
        return view('welcome');
        
    }
}
