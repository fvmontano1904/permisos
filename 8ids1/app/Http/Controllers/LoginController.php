<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{   

    public function login(Request $req){
        $credentials = $req->only('email', 'password');
    
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('app')->plainTextToken;
            $arr = array(
                'acceso' => 'OK',
                'token' =>$token,
                'usuario'=> $user->namespace,
                'id_usuario'=> $user->id,
                'error' => ''
            );
            return json_encode($arr);
        }
        else{
            $arr = array(
                'acceso' => '',
                'token' =>'',
                'error' => 'Usuario y/o contraseña incorrectos'
            );
            return json_encode($arr);
        }
    }
}    