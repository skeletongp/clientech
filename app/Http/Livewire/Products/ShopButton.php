<?php

namespace App\Http\Livewire\Products;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ShopButton extends Component
{
    public $amount=1, $product_id, $product;
    public $isShopping=false;
    public function render()
    {
        return view("livewire.products.shop-button");
    }

    //sum amount if button + is clicked and amount <999
    public function sumAmount()
    {
        if($this->amount<999){
            $this->amount++;
            $this->render();
        }
    }

    //rest amount if button - is clicked and amount >1
    public function restAmount()
    {
        if($this->amount>1){
            $this->amount--;
            $this->render();
        }
    }
   
    //on updated amount, if is greater 999 set amount to 999 and if is less than 1 set amount to 1
    public function updatedAmount($value)
    {
        if($value>999){
            $this->amount=999;
        }
        
    }

    //request product on api and add producto to chart in cache
    public function addToChart()
    {
        if( $this->amount<1){
            $this->amount=1;
        }
        $this->product = $this->getProduct();
        $chart=Cache::get('chart_'.auth()->user()->id)?:[];
        $chart[$this->product_id]=[
            'product'=>$this->product,
            'amount'=>$this->amount
        ];
        Cache::put('chart_'.auth()->user()->id, $chart);
        $this->emit('addedToChart');
        $this->amount=1;
        $this->isShopping=false;
    }

    //get product from api using ENV_API_BASE_URL and ENV_API_AUTH_TOKEN
    public function getProduct()
    {
        try {
            $token = env('API_AUTH_TOKEN');
            $params = [
                'load' => 'stocks.unit|image|stock.unit',
            ];
            $response = Http::withToken($token)
                ->get(env('API_BASE_URL') . '/products/'.$this->product_id, $params);
            if ($response->successful()) {
               return $response->json()['content'];
            } else {
                dd($response->json());
            }
        } catch (\Throwable $th) {
            dd($th);
        };
    }
}
