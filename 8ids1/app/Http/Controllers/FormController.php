<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form(){
        return view('form');
    }
    public function store(Request $var){
        $user = Form::where('usuario','=',$var->usuario)->where('contrasena','=',$var->contrasena)->first();
        if($user){
            return view('dashboard', compact('user'));
        }else{
            return redirect()->to('login');
        }
    
    }
}
