<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registarse</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
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
        <form method="post" action="{{ route('auth.register') }}" style="display:flex; flex-direction: column;">
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
</body>

</html>
