<?php

namespace App\Http\Livewire\Products;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $open=false;
    public $Cart=[];

    protected $listeners = [
        'addedToChart'=>'getData'
    ];

    public function mount(){
        $this->getData();
    }
    public function render()
    {
        $carts=json_decode(json_encode($this->Cart));
        return view('livewire.products.shopping-cart', compact('carts'));
    }

    public function getData(){
        $this->Cart=Cache::get('chart_'.auth()->user()->id)?:[];
        $this->render();
    }
    public function removeProduct($id){
        $chart=Cache::get('chart_'.auth()->user()->id)?:[];
        unset($chart[$id]);
        Cache::put('chart_'.auth()->user()->id, $chart);
        $this->getData();
    }
}
