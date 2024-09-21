<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return response()->json(["Message" => "Bem vindo a API w5i task manager"]);
    }

}
