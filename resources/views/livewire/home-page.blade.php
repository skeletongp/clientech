<div class="py-4 flex flex-col space-y-4 md:space-y-8" data-aos="fade-up">
    <div class="">
        <!-- Jumbotron -->
        <div class="p-12 text-center relative overflow-hidden bg-no-repeat bg-cover rounded-lg"
            style="
    background-image: url('https://res.cloudinary.com/atriontechsd/image/upload/v1665342649/carnibores/la-organizacion-mundial-de-la-salud-oms-CONFIRMA-que-la-carne-procesada-produce-cancer-05_akmusi.jpg');
    height: 400px;
  ">
            <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
                style="background-color: rgba(0, 0, 0, 0.6)">
                <div class="flex justify-center items-center h-full">
                    <div class="text-white">
                        <img src="{{ env('LOGO_PATH') }}" alt="" class="w-52 md:w-72  mx-auto mb-4">
                        <h4 class="font-semibold text-xl mb-6">Somos expertos en sabor, calidad y buen precio.</h4>
                        <a class="inline-block px-7 py-3 mb-1 border-2 border-gray-200 text-gray-200 font-medium text-sm leading-snug uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                            href="{{ route('products') }}" role="button" data-mdb-ripple="true"
                            data-mdb-ripple-color="light">Descubre nuestros productos</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->

    </div>
    <h1 class="font-bold uppercase text-center text-lg md:text-2xl text-primary">Elige lo mejor entre nuestros selectos
        productos</h1>
    <div class="grid md:grid-cols-4 gap-6 w-full   mx-auto " data-aos="fade-right">
        @foreach ($products as $product)
            <livewire:products.card :product="$product" :key="$product['id']" />
        @endforeach
    </div>

</div>
</div>
