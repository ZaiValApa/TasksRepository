<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tareas</title>
</head>
<body>
    <h1>Editar una Tarea</h1>

   <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

        <form method="post" action="{{route('tarea.update',['tarea' => $tarea])}}">
        @csrf
        @method('put')
        <div>
            <label>Tarea: </label>
            <input type="text" name="tarea" placeholder="Ingrese la tarea" value="{{$tarea->tarea}}">
        </div>
        <br>
        <div>
            <label>Descripción: </label>
            <input type="text" name="descripcion" placeholder="Escriba la descripción" value="{{$tarea->descripcion}}">
        </div>
        <br>
        <div>
            <label>Estado:</label>
            <select name="estado" value="{{$tarea->estado}}">
                <option value="1">EN ESPERA</option>
                <option value="2">EN PROCESO</option>
                <option value="3">COMPLETADA</option>
            </select>
        </div>
        <br>
        <div>
            <label>Urgencia:</label>
            <select name="urgencia" value="{{$tarea->urgencia}}">
                <option value="1">ALTA</option>
                <option value="2">MEDIA</option>
                <option value="3">BAJA</option>
            </select>
        </div>
        <br>
        <div>
            <input type="submit" value="Guardar Tarea">
        </div>
    </form>
    <br>
    <div>
        <a href="{{route('tarea.index')}}">Regresar</a>
    </div>
</body>
</html>
