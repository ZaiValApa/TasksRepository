<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tareas</title>
</head>
<body>

    <div style="border: 2px solid rgb(143, 135, 135); padding:3em; margin-left:20em;
    margin-right:20em;">

        <h1>To Do List</h1>

        <div>
            @if(session()->has('success'))
            <div>
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div>
            <a href="{{route('tarea.create')}}">Añadir una Tarea</a>
        </div>
        <br>
        <table border=1>
            <tr>
                <th>ID</th>
                <th>Tarea</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Urgencia</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
            @foreach($tareas as $tarea)
            <tr>
                <td>{{$tarea->id}}</td>
                <td>{{$tarea->tarea}}</td>
                <td>{{$tarea->descripcion}}</td>
                <td>{{$tarea->estado}}</td>
                <td>
                    @if ($tarea->urgencia==1)
                        ALTA
                    @endif
                    @if ($tarea->urgencia==2)
                        MEDIA
                    @endif
                    @if ($tarea->urgencia==3)
                        BAJA
                    @endif
                </td>
                <td><a href="{{route('tarea.edit',['tarea' => $tarea])}}">Editar</a></td>
                <td>
                    <form method="post" action="{{route('tarea.destroy', ['tarea' => $tarea])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" >
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
