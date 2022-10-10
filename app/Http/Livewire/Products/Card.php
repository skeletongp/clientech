<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;

class Card extends Component
{
    public $Product;
    public function mount($product){
        $this->Product = $product;
    }
    public function render()
    {
        $product=json_decode(json_encode($this->Product));
        return view('livewire.products.card', compact('product'));
    }
}
