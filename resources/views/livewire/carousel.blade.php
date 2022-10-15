<section class="splide splide3" aria-labelledby="carousel-heading"  data-aos="fade-up">
    <h1 class="font-bold text-base md:text-xl uppercase text-center pt-8 pb-4">{{ optional($items[0]['category'])['name']?:'Otros' }}</h1>
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($items as $product)
                <li class="splide__slide">
                    <livewire:products.card :product="$product" :key="$product['id']"/>
                </li>
            @endforeach

        </ul>
    </div>
</section>
