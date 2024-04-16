<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tareas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <h1>Crear una Tarea</h1>

    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <form method="post" action="{{ route('tareas.store') }}">
        @csrf
        @method('post')
        <div>
            <label>Tarea: </label>
            <input type="text" name="tarea" placeholder="Ingrese la tarea">
        </div>
        <br>
        <div>
            <label>Descripción: </label>
            <input type="text" name="descripcion" placeholder="Escriba la descripción">
        </div>
        <br>
        <div>
            <label>Estado:</label>
            <select name="estado">

                <option value="" disabled selected>Seleccione el Estado</option>

                @foreach ($statuses as $status)
                    <option value="{{ $status['key'] }}">{{ $status['value'] }}</option>
                @endforeach

            </select>
        </div>
        <br>
        <div>
            <label>Urgencia:</label>
            <select name="urgencia">
                <option value="" disabled selected>Seleccione la Urgencia</option>
                @foreach ($priorities as $priority)
                    <option value="{{ $priority['key'] }}">{{ $priority['value'] }}</option>
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
