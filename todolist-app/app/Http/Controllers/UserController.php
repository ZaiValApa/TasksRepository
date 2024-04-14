<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tarea;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\TareaResource;
use App\Http\Controllers\TareaController;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    public function index()
    {
        $tareas = Tarea::where('user_id', auth()->id())->get();
        return view('users.index', ['tareas' => TareaResource::collection($tareas)]);
    }

    public function create(UserRequest $request)
    {
        $requestValid = $request->validated();
        $requestValid['password'] = bcrypt($requestValid['password']);
        $user = User::create($requestValid);

        auth()->login($user);

        return redirect('/');

    }

    public function login(Request $request){

        $requestValid=$request->validate([
            'loginname' => ['required'],
            'loginpassword' => ['required'],
        ]);

        if(auth()->attempt(['name'=>$requestValid['loginname'],'password'=>$requestValid['loginpassword']])){

            $request->session()->regenerate();

        }

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }


    public function destroy(string $id)
    {
        //
    }
}
