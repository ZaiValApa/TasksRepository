<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tareas</title>
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

    <form method="post" action="{{ route('tarea.store') }}">
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

                {{ $countS = 0 }}

                @foreach ($statuses as $status)
                    {{ $countS++ }}
                    <option value="{{ $countS }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label>Urgencia:</label>
            <select name="urgencia">
                <option value="" disabled selected>Seleccione la Urgencia</option>
                {{ $countP = 0 }}
                @foreach ($priorities as $priority)
                    {{ $countP++ }}
                    <option value="{{ $countP }}">{{ $priority }}</option>
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
        <a href="{{ route('user.index') }}">Regresar</a>
    </div>
</body>

</html>
