<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Carousel extends Component
{
    public $items = [];
    public function render()
    {
        $products=json_decode(json_encode($this->items));
        return view('livewire.carousel', compact('products'));
    }
}
