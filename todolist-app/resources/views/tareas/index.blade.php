<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>Inicio</title>

</head>

<body
    class="flex flex-col justify-center min-h-screen px-60 bg-gradient-to-r
from-indigo-600 from-0% via-blue-500 via-30% to-emerald-400 to-100%">

    <div class="px-10 py-12 font-mono bg-white rounded-lg">
        <div>
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button
                    class="float-right px-4 py-3 text-white bg-red-400 rounded-full shadow-sm hover:bg-red-600 hover:text-blue-50">Cerrar
                    Sesión</button>
            </form>
            <h1 class="mb-4 text-3xl font-extrabold tracking-wider text-left text-blue-500">Bienvenido
                {{ $usuario[0]->name }}!</h1>
        </div>
        <div>
            @if (session()->has('success'))
                <div class="m-auto text-left text-gray-400">{{ session('success') }}</div>
            @endif
        </div>
        <div class="mt-4 text-left">
            <a href="{{ route('tareas.create') }}" class="block w-full text-blue-600 hover:text-emerald-400">Añadir
                Tarea</a>
        </div>
        @if ($tareas->isNotEmpty())
            <table class="w-full mt-4 border border-collapse border-gray-500">
                <thead>
                    <tr>
                        <th class="p-2 border border-gray-500">ID</th>
                        <th class="p-2 border border-gray-500">Tarea</th>
                        <th class="p-2 border border-gray-500">Descripción</th>
                        <th class="p-2 border border-gray-500">Estado</th>
                        <th class="p-2 border border-gray-500">Urgencia</th>
                        <th class="p-2 border border-gray-500" {{ $usuario[0]->role == 'admin' ? '' : 'hidden' }}>Autor
                        </th>
                        <th class="p-2 border border-gray-500">Editar</th>
                        <th class="p-2 border border-gray-500">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr>
                            <td class="p-2 border border-gray-500">{{ $tarea->id }}</td>
                            <td class="p-2 border border-gray-500">{{ $tarea->tarea }}</td>
                            <td class="p-2 border border-gray-500">{{ $tarea->descripcion }}</td>
                            <td class="p-2 border border-gray-500">{{ $tarea->estado_name }}</td>
                            <td class="p-2 border border-gray-500">{{ $tarea->urgencia_name }}</td>
                            <td class="p-2 border border-gray-500" {{ $usuario[0]->role == 'admin' ? '' : 'hidden' }}>
                                {{ $tarea->user->name }}
                            </td>
                            <td class="p-2 border border-gray-500">
                                <a href="{{ route('tareas.edit', ['tarea' => $tarea]) }}"
                                    {{ $tarea->estado != 3 ? '' : 'hidden' }} class="text-blue-500">Editar</a>
                            </td>
                            <td class="p-2 border border-gray-500">
                                <form method="post" action="{{ route('tareas.destroy', ['tarea' => $tarea]) }}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Eliminar" class="text-red-500">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="mt-4 text-center">No hay tareas disponibles</div>
        @endif
    </div>

</body>

</html>
