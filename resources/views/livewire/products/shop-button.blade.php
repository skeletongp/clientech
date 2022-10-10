<div>
    @if (!$isShopping)
        <button wire:click="$set('isShopping', {{true}})">
            <span class="fas fa-shopping-cart text-green-600"></span>
        </button>

    @else
        <div class="flex flex-col space-y-1">
            <div class="flex justify-between items-center text-xs">
                <button wire:click="$set('isShopping', {{false}})">
                    <span class="fas fa-times text-red-600"></span>
                </button>
                <button wire:click="addToChart">
                    <span class="fas fa-check text-green-600"></span>
                </button>
            </div>
            <div class="flex space-x-0">
                <button wire:click.prevent="restAmount" class="bg-primary rounded-l-md w-4 text-white font-bold p-0">
                    -
                </button>
                <input type= "number" wire:keydown.enter="addToChart" wire:model.debounce.200ms="amount" class="bg-white border focus:outline-none w-8 text-center text-sm "/>
                <button wire:click.prevent="sumAmount" class="bg-primary rounded-r-md w-4 text-white font-bold p-0">
                    +
                </button>
            </div>
        </div>
    @endif
</div>
