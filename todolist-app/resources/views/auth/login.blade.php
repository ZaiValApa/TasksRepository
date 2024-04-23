<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title>Inicio de sesion</title>
</head>

<body
    class="flex flex-col justify-center min-h-screen px-72 bg-gradient-to-r
     from-indigo-600 from-0% via-blue-500 via-30% to-emerald-400 to-100%">

    <div class="p-20 m-20 font-mono bg-white rounded-lg">

        <h2 class="pb-5  text-3xl font-extrabold tracking-wider text-center text-blue-500 ">
            ¡Inicia Sesión!
        </h2>

        <form method="post" action="{{ route('auth.login') }}" style="display:flex; flex-direction: column;">
            @csrf
            @method('post')
            <input type="text" name="name" placeholder="Nombre"
                class="block w-full p-3 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400">
            <br>
            <input type="password" name="password" placeholder="Contraseña"
                class="block w-full p-3 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400">
            <br>

            @if ($errors->any())
                <div class="pb-5 text-red-400 md:text-center">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button
                class="flex items-center justify-center w-full px-3 py-2 text-white bg-blue-500 rounded-full shadow-sm hover:bg-blue-600 hover:text-blue-50 ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="px-1 text-lg">Iniciar sesión</span>
            </button>
        </form>

        <div class="pt-5 text-base tracking-tighter text-center">
            ¿No te has registrado?
            <a class="font-bold text-blue-400 -tracking-wide hover:text-emerald-400"
                href="{{ route('register') }}">¡Registrate
                Aquí!</a>
        </div>
    </div>

</body>

</html>
