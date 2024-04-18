<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Registarse</title>
</head>

<body
    class="flex flex-col justify-center min-h-full px-96 bg-gradient-to-r
    from-indigo-600 from-0% via-blue-500 via-30% to-emerald-400 to-100%">

    <div class="p-20 m-20 font-mono bg-white rounded-lg">

        <h2 class="pb-5 font-mono text-3xl font-extrabold tracking-wider text-center text-blue-500 ">
            ¡Registrate ahora!
        </h2>

        <form method="post" action="{{ route('auth.register') }}" style="display:flex; flex-direction: column;">
            @csrf
            @method('post')
            <input type="text" name="name" placeholder="Nombre"
                class="block w-full p-3 mb-4 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400">
            <br>
            <input type="email" name="email" placeholder="Correo"
                class="block w-full p-3 mb-4 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400">
            <br>
            <input type="password" name="password" placeholder="Contraseña"
                class="block w-full p-3 mb-4 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400">
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
                        d="M11.013 2.513a1.75 1.75 0 0 1 2.475 2.474L6.226 12.25a2.751 2.751 0 0 1-.892.596l-2.047.848a.75.75 0 0 1-.98-.98l.848-2.047a2.75 2.75 0 0 1 .596-.892l7.262-7.261Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="px-1 text-lg">Registrarse</span>
            </button>
        </form>
        <div class="pt-5 font-mono text-base tracking-tighter text-center">
            ¿Ya posees una cuenta?
            <a class="font-bold text-blue-400 -tracking-wide hover:text-emerald-400"
                href="{{ route('login') }}">¡Inicia Sesión
                Aquí!</a>
        </div>

    </div>
</body>

</html>
