<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class AuthController extends Controller
{
    public function registerView()
    {
        //llamando vista de registro de nuevo usuario
        return view('auth.register');
    }

    public function loginView()
    {
        //llamando vista de inicio usuario
        return view('auth.login');
    }

    public function register(UserRequest $request)
    {
        //validando datos de nuevo usuario
        $requestValid = $request->validated();
        $requestValid['password'] = bcrypt($requestValid['password']);

        //creando nuevo usuario
        $user = User::create($requestValid);

        //autenticando usuario
        auth()->login($user);

        //redireccionando a tareas
        return redirect('/tareas');

    }

    public function login(Request $request)
    {
        //validando datos de usuario
        $requestValid = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        //realizando autentificación
        if (auth()->attempt(['name' => $requestValid['name'], 'password' => $requestValid['password']])) {
            $request->session()->regenerate();
        }

        //redireccionando a vista index de tareas
        return redirect('/tareas');
    }

    public function logout()
    {
        //cerrando autentificación
        auth()->logout();

        //redireccionando a login de usuarios
        return redirect('/login');
    }
}
