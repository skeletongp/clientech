<?php

namespace App\Http\Livewire\Products;

use App\Http\Livewire\Paginated;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Products extends Paginated
{
    public $categories = [];


    public function render()
    {
        return view('livewire.products.products');
    }
    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        try {
            $token = env('API_AUTH_TOKEN');
            
            $params = [
                'load' => 'products.stocks.unit|products.image|products.stock.unit',
                'perpage' => 100,
                'page' => $this->page,
                'search' => request()->search,
            ];
            $response = Http::withToken($token)
                ->get(env('API_BASE_URL') . '/categories', $params);
            if ($response->successful()) {
                $this->categories = $response->json()['content']['data'];
                $this->links($response);
            } else {
                dd($response->json());
            }
        } catch (\Throwable $th) {
            dd($th);
        };
        
    }
}
