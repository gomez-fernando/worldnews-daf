<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function config(){
        return view('user.config');
    }

    public function update(Request $request){
        // conseguir el usuario identificado
        $user = \Auth::user();

        $id = $user->id;

        // validacion del formulario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email, '.$id,
        ]);

        if($request->input('password')){
            // validacion de la contraseña
            $validate = $this->validate($request, [
                'password' => 'string|min:6|confirmed',
            ]);

        }

        // recoger los datos del formulario
        $id = \Auth::user()->id;
        $name = $request->input('name');
        $surname = $request->input('surname');
        $username = $request->input('username');
        $email = $request->input('email');

        //setear o asignar los valores al objeto  usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->username = $username;
        $user->email = $email;
        if($request->input('password')){
            $user->password = Hash::make($request['password']);

        }

        //ejecutar consulta y cambios en la db
        $user->update();

        return redirect()->route('config')
            ->with(['message'=>'Usuario actualizado correctamente']);
    }


}
