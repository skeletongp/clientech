<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class HomePage extends Paginated
{
    public $products = [];

    public function render()
    {
        return view('livewire.home-page');
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
                'load' => 'stocks.unit|image|stock.unit',
                'perpage' => 4,
                'page' => $this->page,
                'sort' => 'stock.price_menor',
            ];
            $response = Http::withToken($token)
                ->get(env('API_BASE_URL') . '/products', $params);
            if ($response->successful()) {
                $this->products = $response->json()['content']['data'];
                $this->links($response);
            } else {
                dd($response->json());
            }
        } catch (\Throwable $th) {
            dd($th);
        };
    }
}
