<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class ConnectController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['getLogout']);
    }
    public function getLogin(){
        return view('connect.login');
    }
    public function postLogin(Request $request){
        $rules =[
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];

        $messages = [

            'email.required' => 'Ingrese su correo electronico.',
            'email.email' => 'Correo invalido.',
            'password.required' => 'Ingrese su contraseña.',
            'password.min' => 'Su contraseña debe tener al menos 8 caracteres.',
    
        ];
        $validator = Validator::make($request->all(), $rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error', 'typealert', 'danger');
        else:
            if(Auth::attempt(['email' => $request-> input ('email'), 'password' => $request -> input ('password')], true)):
                return redirect('/');
            else:
                return back()->with('message', 'El correo electronico y la contraseña no coinciden', 'typealert', 'danger');
            endif;
        endif;
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
            'name.required' => 'Ingrese su nombre.',
            'lastname.required' => 'Ingrese su apellido.',
            'email.required' => 'Ingrese su correo electronico.',
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

                if($user->save()):
                    return redirect('/login') ->with('message', 'Usuario registrado correctamente', 'typealert', 'succes');
                endif;

            endif;
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');   
    }
}
