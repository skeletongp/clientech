    <ul class="flex py-4 justify-between items-cencer">
        <li>
            <button wire:click="$emit('prevPage')" {{ $page == 1 ? 'disabled' : '' }}
                class="py-2 px-3 ml-0 leading-tight text-gray-900 bg-white rounded-l-lg  border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white disabled:text-gray-300">Anterior</button>
        </li>
        <li>
            <input type="number" name="page" id="page" wire:model.defer="page" wire:keydown.enter="$emit('goToPage', {{$page}})"
                class=" focus:outline-none rounded-xl px-2 py-1 border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white w-24"
                placeholder="Ir a">
        </li>

        <li>
            <button wire:click="$emit('nextPage')" {{ $page == $lastPage ? 'disabled' : '' }}
                class="py-2 px-3  leading-tight text-gray-900 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white disabled:text-gray-300">Siguiente</button>
        </li>
    </ul>
