<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
</head>

<body>
    @auth
        <div style="border: 2px solid rgb(143, 135, 135); padding:3em; margin-left:20em;
        margin-right:20em;">
            <form action='logout' method="POST">
                @csrf
                <button>Cerrar Sesión</button>
            </form>

            <h1>To Do List</h1>

            <div>
                @if (session()->has('success'))
                    <div>
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div>
                <a href="{{ route('tarea.create') }}">Añadir una Tarea</a>
            </div>
            <br>
            <!--
            {//{ json_encode($tareas) }}
            <br>
            {//{ json_encode($tareas[0]) }}
            <br>
            {//{ json_encode($tareas[0]->estado) }}
            <br>
            {//{ gettype($tareas[0]) }}-->


        </div>
    @else
        <div style="border: 2px solid rgb(143, 135, 135); padding:3em; margin-left:20em;
         margin-right:20em;">
            <h2>¡Registrate ahora!</h2>
            <div>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <form method="post" action="{{ route('user.store') }}" style="display:flex; flex-direction: column;">
                @csrf
                @method('post')
                <input type="text" name="name" placeholder="Nombre">
                <br>
                <input type="email" name="email" placeholder="Correo">
                <br>
                <input type="password" name="password" placeholder="Contraseña">
                <br>
                <button>Registrarse</button>
            </form>
        </div>
        <div style="border: 2px solid rgb(143, 135, 135); padding:3em; margin-left:20em;
         margin-right:20em;">
            <h2>¡Inicia sesión aquí!</h2>
            <div>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <form method="post" action="/login" style="display:flex; flex-direction: column;">
                @csrf
                @method('post')
                <input type="text" name="loginname" placeholder="Nombre">
                <br>
                <input type="password" name="loginpassword" placeholder="Contraseña">
                <br>
                <button>Iniciar sesión</button>
            </form>
        </div>
    @endauth
</body>

</html>
