<?php

namespace App\Http\Livewire\Products;

use App\Http\Livewire\Paginated;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Products extends Component
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
                'load' => 'image|stock.unit|category',
                'nested' => 'category_id',
            ];
            $response = Http::withToken($token)
                ->get(env('API_BASE_URL') . '/products', $params);
            if ($response->successful()) {
                $this->categories = $response->json()['content'];
            } else {
                dd($response->json());
            }
        } catch (\Throwable $th) {
            dd($th);
        };
        
    }
}
