<?php

namespace App\Http\Livewire\Products;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
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

    public function sendOrder(){
        $cart=Cache::get('chart_'.auth()->user()->id);
        $items='';
        foreach ($cart as $value) {
            $items.=$value['amount'].' ('.$value['product']['stock']['unit']['symbol'].') '.$value['product']['name'].PHP_EOL;
        }
        $response=Http::withToken(env('API_AUTH_TOKEN'))
            ->post(env('API_BASE_URL').'/shoppings/order', [
                'phone'=>env('ADMIN_PHONE'),
                'message'=>'Pedido de '.auth()->user()->name.' - '.auth()->user()->phone.PHP_EOL.$items
            ]);
        if($response->successful()){
            $response2=Http::withToken(env('API_AUTH_TOKEN'))
                ->post(env('API_BASE_URL').'/shoppings/order', [
                    'phone'=>auth()->user()->phone,
                    'message'=>'Gracias por realizar su pedido. Aquí los detalles:'.PHP_EOL.$items.PHP_EOL.'Más información llamar a '.env('ADMIN_PHONE'),
                ]);
            if($response2->successful()){

                Cache::forget('chart_'.auth()->user()->id);
                $this->getData();
            }
        }
        
     }
}
