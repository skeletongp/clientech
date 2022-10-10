<x-app-layout>
    <div class="py-4 overflow-hidden h-1/2 md:h-full md:mt-4 ">
        <div class="md:h-36">
            <!-- Jumbotron -->
            <div class="p-12 text-center relative overflow-hidden bg-no-repeat bg-cover rounded-lg"
                style="
        background-image: url('https://res.cloudinary.com/atriontechsd/image/upload/v1665342649/carnibores/la-organizacion-mundial-de-la-salud-oms-CONFIRMA-que-la-carne-procesada-produce-cancer-05_akmusi.jpg');
        height: 400px;
      ">
                <div class="absolute top-0 right-0 bottom-0 left-0 w-full md:h-full overflow-hidden bg-fixed"
                    style="background-color: rgba(0, 0, 0, 0.6)">
                    <div class="flex justify-center items-start pt-12 h-full">
                        <div class="text-white">
                            <h4
                                class="w-4/5 md:w-full font-semibold text-xl md:text-2xl lg:text-4xl text-center mx-auto mb-6">
                                Resutados de '{{ request()->search }}'.</h4>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jumbotron -->

        </div>

        <div class="max-w-4xl py-4">
            <livewire:carousel :items="$products" />
        </div>

    </div>


</x-app-layout>
