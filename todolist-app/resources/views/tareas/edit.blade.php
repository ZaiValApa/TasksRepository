<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>Editar Tareas</title>

</head>

<body class="flex flex-col justify-center min-h-full px-96 bg-gradient-to-r from-indigo-600 via-blue-500 to-emerald-400">

    <div class="p-20 m-20 font-mono bg-white rounded-lg">

        <h1 class="pb-5 font-mono text-3xl font-extrabold tracking-wider text-center text-blue-500">Editar Tarea</h1>

        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <form method="POST" action="{{ route('tareas.update', ['tarea' => $tarea]) }}" class="flex flex-col">
            @csrf
            @method('put')
            <div class="mb-4">
                <label class="block mb-2">Tarea:</label>
                <input type="text" name="tarea" placeholder="Ingrese la tarea"
                    class="block w-full p-3 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400"
                    value="{{ $tarea->tarea }}">
            </div>
            <div class="mb-4">
                <label class="block mb-2">Descripción:</label>
                <input type="text" name="descripcion" placeholder="Escriba la descripción"
                    class="block w-full p-3 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400"
                    value="{{ $tarea->descripcion }}">
            </div>
            <div class="mb-4">
                <label class="block mb-2">Estado:</label>
                <select name="estado"
                    class="block w-full p-3 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400">
                    @foreach ($statuses as $status)
                        <option value="{{ $status['key'] }}" {{ $tarea->estado == $status['key'] ? 'selected' : '' }}>
                            {{ $status['value'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block mb-2">Urgencia:</label>
                <select name="urgencia"
                    class="block w-full p-3 text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-gray-300 placeholder:text-gray-400">
                    @foreach ($priorities as $priority)
                        <option value="{{ $priority['key'] }}"
                            {{ $tarea->urgencia == $priority['key'] ? 'selected' : '' }}>
                            {{ $priority['value'] }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="mb-4">
                <button
                    class="w-full px-3 py-2 text-white bg-blue-500 rounded-full shadow-sm hover:bg-blue-600 hover:text-blue-50">
                    Guardar Tarea
                </button>
            </div>
        </form>
        <div>
            <a href="{{ route('tareas.index') }}"
                class="block w-full px-3 py-2 text-center text-blue-500 hover:text-emerald-400">Regresar</a>
        </div>
    </div>

</body>

</html>
