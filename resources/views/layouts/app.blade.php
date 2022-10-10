<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="./fa/css/all.css">
    @livewireStyles
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
        </style>
</head>

<body style="font-family: 'Poppins', sans-serif;">
    <main class="max-w-7xl mx-auto" x-init x-cloak>
        <div class="hidden md:block sticky top-0 z-30">
            @include('layouts.header')
        </div>
        <div class=" mx-auto p-4 flex flex-col  items-center justify-center" >
            {{ $slot }}
          @auth
          <livewire:products.shopping-cart />
          @endauth
        </div>
    </main>
    @livewireScripts
    @stack('js')
    <script>
        AOS.init();
        
        </script>
      
</body>

</html>
