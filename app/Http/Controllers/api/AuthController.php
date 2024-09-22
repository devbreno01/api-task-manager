<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//1|tnUYW0Z7TQANtW9D7XxyRHPQmVImUFM0PanmQYQ669dca1e2
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

    public function logout(){
        
    }
}
