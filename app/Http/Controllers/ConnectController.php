<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ConnectController extends Controller
{
    public function getLogin(){
        return view('connect.login');
    }

    public function getRegister(){
        return view('connect.register');
    }

    public function postRegister(Request $request){
        $rules =[
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ];


    $messages = [
        'name.required' => 'Su nombre es requerido.',
        'lastname.required' => 'Su apellido es requerido.',
        'email.required' => 'Su correo es requerido.',
        'email.email' => 'Correo invalido.',
        'email.unique' => 'Su correo ya esta registrado, Inicia Sesión.',
        'password.required' => 'Ingrese una contraseña.',
        'password.min' => 'Su contraseña debe tener al menos 8 caracteres.',

    ];
    $validator = Validator::make($request->all(), $rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error', 'typealert', 'danger');
        else:
            $user = new User;
            $user->name= $request->input('name');
            $user->lastname= $request->input('lastname');
            $user->email= $request->input('email');
            $user->password = Hash::make($request->input('password'));

            if($user->save());
                return redirect('/login') ->with('message', 'Usuario registrado correctamente', 'typealert', 'succes');
                
        endif;
    }
}
