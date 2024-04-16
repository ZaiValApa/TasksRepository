<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div style="border: 2px solid rgb(143, 135, 135); padding:3em; margin-left:20em; margin-right:20em;">
        <div>
            <form action="{{ route('auth.logout') }}" method="POST">
                <button style="height:fit-content; float: right;">Cerrar Sesión</button>
                @csrf
            </form>

            <h1>Bienvenido! </h1>
        </div>
        <div>
            @if (session()->has('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div>
            <a href="{{ route('tareas.create') }}">Añadir Tarea</a>
        </div>
        @if ($tareas->isNotEmpty())
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Tarea</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Urgencia</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
                @foreach ($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->id }}</td>
                        <td>{{ $tarea->tarea }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->estado_name }}</td>
                        <td>{{ $tarea->urgencia_name }}</td>
                        <td><a href="{{ route('tareas.edit', ['tarea' => $tarea]) }}">Editar</a></td>
                        <td>
                            <form method="post" action="{{ route('tareas.destroy', ['tarea' => $tarea]) }}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <table border="1">
                <tr>
                    <td>No hay tareas disponibles</td>
                </tr>
            </table>
        @endif
    </div>
</body>

</html>
