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
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

        <form method="post" action="{{route('tarea.store')}}">
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
            <select name="estado" >
                <option value="" disabled selected>Seleccione el Estado</option>
                <option value="1">EN ESPERA</option>
                <option value="2">EN PROCESO</option>
                <option value="3" disabled>COMPLETADA</option>
            </select>
        </div>
        <br>
        <div>
            <label>Urgencia:</label>
            <select name="urgencia" >
                <option value="" disabled selected>Seleccione el Estado</option>
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