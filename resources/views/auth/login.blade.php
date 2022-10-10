<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg rounded-xl">
            <div class="w-20 h-20 md:w-32 md:h-32  mx-auto rounded-lg p-3 bg-center bg-contain bg-no-repeat "
                style="background-image: url({{ env('LOGO_PATH') }})">
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mt-4">
                    <div>
                        <label class="block" for="email">Correo Electrónico<label>
                                <input type="text" placeholder="Correo Electrónico" name="email"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="mt-4">
                        <label class="block">Contraseña<label>
                                <input type="password" placeholder="Contraseña" name="password"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="flex items-baseline justify-between py-2">
                        <x-button>
                            Acceder
                        </x-button>
                        <a href="{{route('signup')}}" class="text-sm text-blue-600 hover:underline">Crear Cuenta</a>
                    </div>
                </div>
            </form>
            @if ($errors->any())
                <div>
                    <div class="font-medium text-red-600">{{ __('Lo sentimos, ha ocurrido un error.') }}</div>

                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

    </div>

</body>

</html>
