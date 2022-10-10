<nav class=" bg-gray-100   px-2  pt-4 w-full flex justify-between items-center ">
    <div class="flex items-center space-x-4 pb-0 h-[2rem]">
        <a href="/" class="py-0 ">
            <div class=" h-28 w-32 mt-6   rounded-sm bg-center bg-contain  bg-no-repeat"
                style="background-image: url({{ env('LOGO_PATH') }})">

            </div>
        </a>
        <ul class="list-none h-full font-bold flex space-x-0 divide-x-[0.5px] divide-gray-200">
            <li
                class=" w-32 flex items-center justify-center hover:bg-blue-400 {{ request()->routeIs('home') ? 'bg-blue-600 text-gray-300' : 'bg-transparent text-primary' }}">
                <a href="{{ route('home') }}"
                    class=" hover:text-blue-300 hover:shadow-white  hover:underline px-2  ">Home</a>
            </li>
            <li
                class=" w-32 flex items-center justify-center hover:bg-blue-400 {{ request()->routeIs('products') ? 'bg-blue-600 text-gray-300' : 'bg-transparent text-primary' }}">
                <a href="{{ route('products') }}"
                    class=" hover:text-blue-300 hover:shadow-white  hover:underline px-2 ">Productos</a>
            </li>
           
            <li
                class=" w-32 flex items-center justify-center hover:bg-blue-400 {{ request()->routeIs('ofertas') ? 'bg-blue-600 text-gray-300' : 'bg-transparent text-primary' }}">
                <a href="{{ route('products') }}"
                    class=" hover:text-blue-300 hover:shadow-white  hover:underline px-2 ">De la Casa</a>
            </li>
            <li
                class=" w-32 flex items-center justify-center hover:bg-blue-400 {{ request()->routeIs('ofertas') ? 'bg-blue-600 text-gray-300' : 'bg-transparent text-primary' }}">
                <a href="{{ route('products') }}"
                    class=" hover:text-blue-300 hover:shadow-white  hover:underline px-2 ">Salamis</a>
            </li>
            <li
                class=" w-32 flex items-center justify-center hover:bg-blue-400 {{ request()->routeIs('ofertas') ? 'bg-blue-600 text-gray-300' : 'bg-transparent text-primary' }}">
                <a href="{{ route('products') }}"
                    class=" hover:text-blue-300 hover:shadow-white  hover:underline px-2 ">Ahumados</a>
            </li>
        </ul>

    </div>
    <div class="flex items-center space-x-4 py-0 h-full">
        <div>
            <form action="{{route('products.search')}}" method="GET">
                <div class="flex font-normal text-sm space-x-0">
                    <input type="search" placeholder="Buscar" name="search" value="{{old('search', request()->search)}}" class="py-1 border border-gray-200 focus:outline-none px-2 rounded-l-lg !font-normal">
                    <x-button class="rounded-l-none ">Buscar</x-button>
                </div>
            </form>
        </div>
        <div>
            <ul class="list-none font-bold flex space-x-2">
                @auth
                    <li>
                        <x-dropdown :triggerClass="'bg-white px-1 rounded-xl hover:bg-gray-200'">
                            <x-slot name="trigger">
                                <x-button class="rounded-full w-8 h-8 bg-center bg-cover "
                                    style="background-image: url(https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }})">
                                </x-button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="flex flex-col space-y-4 p-1">
                                    <x-button class="w-full">
                                        <a href="{{ route('home') }}">
                                            <span class="fas fa-user"></span>
                                            <span>Perfil</span>
                                        </a>
                                    </x-button>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <x-button type="submit" class="w-full">Salir</x-button>
                                    </form>
                                </div>


                            </x-slot>
                        </x-dropdown>
                    </li>
                @else
                    <li
                        class=" w-24 flex items-center justify-center hover:bg-blue-400 {{ request()->routeIs('access') ? 'bg-blue-600 text-gray-300' : 'bg-transparent text-black' }}">
                        <a href="{{ route('access') }}"
                            class=" hover:text-blue-300 hover:shadow-white  hover:underline px-2 ">Acceder</a>
                    </li>

                @endauth
            </ul>
        </div>
    </div>
</nav>
