<div class=" h-[13.5rem] mx-2 relative  flex flex-col space-y-1 shadow-xl rounded-xl border border-blue-100 bg-white">
    <div class="absolute top-0 bottom-0 left-0  right-0 -z-10 opacity-10 bg-gradient-to-b from-white to-cyan-50"></div>
    <div class="w-32 h-32 mx-auto transform hover:scale-150 hover:translate-y-10  bg-center rounded-full bg-cover " style="background-image: url({{ $product->image }})">

    </div>
    <div class="absolute top-1  right-1">
        <span>{{$product->code}}</span>
    </div>
    <div class="px-4">
        <div class="text-sm md:text-base font-bold w-full overflow-hidden overflow-ellipsis whitespace-nowrap">{{ $product->name }}</div>
    </div>
    <div class="w-full px-4 ">
        <div class="flex items-end justify-between p-2">
            <div class=" leading-3 text-primary">
                <div class="text-sm md:text-base font-bold">{{ $product->stock->formatted_price }} <span
                        class="text-xs font-normal">({{ $product->stock->unit->symbol }})</span></div>
            </div>
           <div>
            @auth
            <livewire:products.shop-button :product_id="$product->id" :key="$product->id"/>
            @else
            <a href="{{ route('login') }}">
                <span class="fas fa-shopping-cart text-green-600"></span>
            </a>
            @endauth
           </div>
        </div>
    </div>

</div>
