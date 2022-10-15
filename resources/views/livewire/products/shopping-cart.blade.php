<div x-data="{ open: false }">
    <div x-click.away="open = false"  @keyup.escape="open = false">
        <button @click="open = !open"
            class="fixed bottom-2 right-2 md:bottom-4 md:right-4 md:text-xl bg-gray-200 rounded-full w-12 h-12 flex items-center justify-center hover:bg-gray-100 text-green-600 z-30">
            <span class="fas fa-shopping-cart"></span>
        </button>
        <div :class="open ? 'translate-x-0 opacity-1' : 'translate-x-96 opacity-50'"  
    
            class="fixed w-96 px-4  overflow-auto  transform pt-10 transition-all ease-linear duration-300 bg-gray-100 shadow-sm top-2 bottom-4 right-0 z-20 shadow-primary">
            <h1 class="text-center font-bold uppercase md:text-xl sticky -top-2 -right-2 -left-2 bg-gray-100 py-2 -mt-4 z-20 ">Tu Carrito</h1>
            <div class="flex flex-col space-y-2 py-4 relative ">
                @forelse ($carts as $cart)
                    <div class="w-full p-1  flex flex-col py-2 overflow-y-auto relative">
                        <div class="flex space-x-4">
                            <div class="w-12 h-12 rounded-full bg-center bg-cover"
                                style="background-image: url({{ $cart->product->image }})">
                            </div>
                            <div class="">
                                <div>{{ formatNumber($cart->amount) }}<sup>({{$cart->product->stock->unit->symbol}})</sup> X {{ $cart->product->stock->formatted_price }}</div>
                                <br>
                                <span class="font-bold text-primary"> Total
                                    ${{ formatNumber($cart->amount * $cart->product->stock->price) }}</span> <br>
                            </div>
                        </div>
                        <div class="px-2 font-bold text-green-700">
                            {{ ellipsis($cart->product->name, 22) }}
                        </div>
                        <div class="absolute top-0 right-0">
                            <button wire:click="removeProduct({{$cart->product->id}})">
                                <span class="fas fa-times text-red-600"></span>
                            </button>
                        </div>
                    </div>
                    <hr>
                @empty
                    <div class="text-center text-gray-500">
                        <span class="fas fa-shopping-cart"></span>
                        <br>
                        <span class="text-sm">No hay productos en el carrito</span>
                    </div>
                @endforelse
            </div>
            <div class="p-4">
                
                <div class="mt-4">
                    <button wire:click="sendOrder"
                        class="w-full bg-primary text-white text-center py-2 rounded-md hover:bg-primary-dark">
                        Confirmar Pedido</button>
                </div>
            </div>
        </div>
    </div>
    
</div>