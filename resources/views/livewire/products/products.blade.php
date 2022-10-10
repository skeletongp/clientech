<div class="py-4 overflow-hidden h-1/2 md:h-full md:mt-4 ">
    <div class="">
        <!-- Jumbotron -->
        <div class="p-12 text-center relative overflow-hidden bg-no-repeat bg-cover rounded-lg"
            style="
    background-image: url('https://res.cloudinary.com/atriontechsd/image/upload/v1665342649/carnibores/la-organizacion-mundial-de-la-salud-oms-CONFIRMA-que-la-carne-procesada-produce-cancer-05_akmusi.jpg');
    height: 400px;
  ">
            <div class="absolute top-0 right-0 bottom-0 left-0 w-full md:h-full overflow-hidden bg-fixed"
                style="background-color: rgba(0, 0, 0, 0.6)">
                <div class="flex justify-center items-center h-full">
                    <div class="text-white">
                        <h4 class="w-4/5 md:w-1/2 font-semibold text-xl md:text-2xl lg:text-4xl text-center mx-auto mb-6">Explora la variedad que ofrecemos en productos de
                            primera.</h4>
                        <section class="splide splide1 w-96 mx-auto" aria-labelledby="carousel-heading" data-aos="fade-up">
                            <div class="splide__track">
                                
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->

    </div>
    @foreach ($categories as $category)
        <h1 class="font-bold text-base md:text-xl uppercase text-center pt-8 pb-4">{{ $category['name'] }}</h1>
        <livewire:carousel :items="$category['products']" />
    @endforeach
</div>
