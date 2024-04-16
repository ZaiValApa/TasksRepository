<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function register(UserRequest $request)
    {
        $requestValid = $request->validated();
        $requestValid['password'] = bcrypt($requestValid['password']);

        $user = User::create($requestValid);

        auth()->login($user);

        return redirect('/tareas');
    }

    public function login(LoginRequest $request)
    {
        if (auth()->attempt(['name' => $request->name, 'password' => $request->password])) {
            $request->session()->regenerate();
        }

        return redirect('/tareas');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
