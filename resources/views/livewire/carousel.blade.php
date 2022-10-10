<section class="splide splide3" aria-labelledby="carousel-heading"  data-aos="fade-up">
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
