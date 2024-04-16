<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-blue-200">
    <div class="w-1/2 border-2 border-gray-600 p-4 mx-auto mt-32 rounded-md bg-white shadow-xl shadow-gray-500">
        <h2 class="text-3xl text-center mb-4">
            ¡Inicia sesión aquí!
        </h2>
        <hr>
        <form method="post" action="{{ route('auth.login') }}" class="flex flex-col mt-4">
            @csrf
            @method('post')
            <div class="flex flex-col mb-4">
                <label for="name" class="text-lg font-medium font-sans">
                    Nombre:
                </label>
                <input type="text" name="name" id="name" placeholder="Nombre" class="rounded-md p-2 border-2 shadow-blue-200 shadow-md hover:shadow-blue-300">
            </div>

            <div class="flex flex-col mb-4">
                <label for="password" class="text-lg font-medium font-sans">
                    Password:
                </label>
                <input type="password" name="password" id="password" placeholder="Contraseña" class="rounded-md p-2 border-2 shadow-blue-200 shadow-md hover:shadow-blue-300">
            </div>

            @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-red-500">
                    @foreach ($errors->all() as $error)
                    <li class="text-sm text-red-500">
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <button class="bg-blue-500 p-2 rounded-md text-white hover:bg-blue-600 flex flex-row justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                </svg>
                <span class="ml-2">
                    Iniciar sesión
                </span>
            </button>
        </form>
    </div>
</body>

</html>
