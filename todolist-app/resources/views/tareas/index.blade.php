<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>Inicio</title>

</head>

<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-indigo-600 via-blue-500 to-emerald-400">

    <div class="p-10 mx-auto bg-white rounded-lg m">
        <div>
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button class="float-right px-4 py-3 text-white bg-red-400 rounded-full shadow-sm hover:bg-red-600 hover:text-blue-50">Cerrar Sesión</button>
            </form>
            <h1 class="mb-4 text-2xl font-bold text-left">Bienvenido {{ $usuario[0]->name }}!</h1>
        </div>
        <div>
            @if (session()->has('success'))
                <div class="text-left text-green-500">{{ session('success') }}</div>
            @endif
        </div>
        <div class="mt-4 text-left">
            <a href="{{ route('tareas.create') }}" class="text-blue-500">Añadir Tarea</a>
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
                        <th class="p-2 border border-gray-500" {{ $usuario[0]->role == 'admin' ? '' : 'hidden' }}>Autor</th>
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
                                @php
                                    $user = $usuarios->firstWhere('id', $tarea->user_id);
                                @endphp
                                {{ $user ? $user->name : '' }}
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
