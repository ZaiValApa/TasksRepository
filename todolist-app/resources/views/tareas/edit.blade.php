<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tareas</title>
</head>

<body>
    <h1>Editar Tarea</h1>

    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <form method="POST" action="{{ route('tareas.update', ['tarea' => $tarea]) }}">
        @csrf
        @method('put')
        <div>
            <label>Tarea: </label>
            <input type="text" name="tarea" placeholder="Ingrese la tarea" value="{{ $tarea->tarea }}">
        </div>
        <br>
        <div>
            <label>Descripción: </label>
            <input type="text" name="descripcion" placeholder="Escriba la descripción"
                value="{{ $tarea->descripcion }}">
        </div>
        <br>
        <div>
            <label>Estado:</label>

            <select name="estado">

                @foreach ($statuses as $status)
                    @if ($tarea->estado == $status['key'])
                        <option value="{{ $status['key'] }}" selected>{{ $status['value'] }}</option>
                    @else
                        <option value="{{ $status['key'] }}">{{ $status['value'] }}</option>
                    @endif
                @endforeach

            </select>
        </div>
        <br>
        <div>
            <label>Urgencia:</label>

            <select name="urgencia">
                @foreach ($priorities as $priority)
                    @if ($tarea->urgencia == $priority['key'])
                        <option value="{{ $priority['key'] }}" selected>{{ $priority['value'] }}</option>
                    @else
                        <option value="{{ $priority['key'] }}">{{ $priority['value'] }}</option>
                    @endif
                @endforeach

            </select>
        </div>
        <br>
        <div>
            <input type="submit" value="Guardar Tarea">
        </div>
    </form>
    <br>
    <div>
        <a href="{{ route('tareas.index') }}">Regresar</a>
    </div>
</body>

</html>
