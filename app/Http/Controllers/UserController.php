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

//    public function index($search = null){
//        if (!empty($search)){
//            $users = User::where('nick','LIKE', '%'.$search.'%')
//                ->orWhere('name','LIKE', '%'.$search.'%')
//                ->orWhere('surname','LIKE', '%'.$search.'%')
//                ->orderBy('id', 'desc')
//                ->paginate(5);
//        } else {
//            $users = User::orderBy('id', 'desc')->paginate(5);
//        }
//
//
//        return view('user.index', [
//            'users' => $users
//        ]);
//    }


    public function config(){
        return view('user.config');
    }

    public function update(Request $request){
        // conseguir el usuario identificado, si el usuario no está identificado hay que hacer un find es decir un select a la base de datos
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


        // el Auth le ponemos una barra delante por si falla al no tener ningún namespace declarado
        // recoger los datos del formulario
        $id = \Auth::user()->id;
        $name = $request->input('name');
        $surname = $request->input('surname');
        $username = $request->input('username');
        $email = $request->input('email');


        //setear o asignar los valores al objeto dl usuario
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

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function profile($id){
        $user = User::find($id);
        // $user = \Auth::user();

        /////////////////////////////////
        $images = Image::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(5);
/////////////////////////////////////////////



        return view('user.profile', [
            'user' => $user,
            'images' => $images
        ]);
    }


}
