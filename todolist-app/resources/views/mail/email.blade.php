<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>Notificación de Tarea Completada</title>
</head>

<body class="flex flex-col justify-center min-h-screen bg-gradient-to-r
from-indigo-600 from-0% via-blue-500 via-30% to-emerald-400 to-100%">
    <div class="w-full bg-white shadow-lg ">
        <div class="p-20">
            <h2 class="text-3xl font-extrabold text-center text-blue-500">¡Tarea Completada!</h2>
            <p class="mt-4">Hey Admin,</p>
            <p>{{ $name }} ha completado la asignación de {{ $tarea }}.</p>
            <br>
            <p class="text-left">Saludos,<br>El equipo de Mailtrap</p>
        </div>
    </div>
</body>

</html>
