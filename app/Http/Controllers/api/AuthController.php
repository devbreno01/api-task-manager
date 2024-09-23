<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//2|XpOzhgHFTbdR5d4aYnIQUrz7hAkxLF9yYHjdsqLbfd9c845a

//3|BGCxI7EOAvah5eEZkLleydskf57XPSO7C9FAHYaod464debf
class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email , 'password' => $request->password])){
            $user = Auth::user();
            return response()->json([ 'status' =>'Authorized',
                                    'token' => $request->user()->createToken('users')->plainTextToken], 200); 

        }
            return response()->json(['status'=>'Not Authorized',
                                    'message' =>'Senha ou email incorretos'], 403);
    }

    public function logout(Request $request){
        if($request->user()->currentAccessToken()->delete()){
            return response()->json(["status" => "sucess", 
                                'message' => "Deslogado"], 200);
        } else {
            return response()->json(["status" => "failed", 
                                    "messag'" => "Falha ao tentar deslogar"], 500);
        }

        
    }
}
