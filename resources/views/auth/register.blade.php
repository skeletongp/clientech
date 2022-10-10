<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Cuenta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- component -->
    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-md mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <form action="{{ route('register') }}" method="POST" class="w-full">
                @csrf
                <div class="bg-white px-4 space-y-6 py-4 rounded shadow-md text-black w-full">
                    <h1 class="mb-8 text-xl md:text-3xl font-bold text-center">Crea una cuenta</h1>
                    <div>
                        <input type="text" class="block border border-grey-light w-full p-3 rounded "
                            name="name" placeholder="Nombre Completo" />
                        <x-input-error for="name"></x-input-error>
                    </div>
                   <div>
                    <input type="text" class="block border border-grey-light w-full p-3 rounded " name="email"
                    placeholder="Correo Electrónico" />
                    <x-input-error for="email"></x-input-error>
                   </div>
                   <div>
                    <input type="password" class="block border border-grey-light w-full p-3 rounded "
                    name="password" placeholder="Contraseña" />
                    <x-input-error for="password"></x-input-error>
                   </div>
                    <div>
                        <input type="password" class="block border border-grey-light w-full p-3 rounded "
                        name="password_confirmation" placeholder="Confirme la Contraseña" />
                    </div>
                    <x-button
                        class=" uppercase mx-auto justify-center w-full text-white bg-teal-700 hover:bg-teal-300 hover:text-black">
                        Acceder
                    </x-button>
                </div>
            </form>

            <div class="text-grey-dark mt-6">
                ¿Ya tienes una cuenta?
                <a class="no-underline border-b border-blue-500 text-blue-500" href="{{ route('access') }}">
                    Inicia Sesión
                </a>.
            </div>
        </div>
    </div>
</body>

</html>
