<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.products.index');
    }

    //method to search products and call to api
    public function search(Request $request)
    {
        $search = $request->search;
        try {
            $token = env('API_AUTH_TOKEN');
            
            $params = [
                'load' => 'stocks.unit|image|stock.unit',
                'search' => request()->search,
            ];
            $response = Http::withToken($token)
                ->get(env('API_BASE_URL') . '/products', $params);
            if ($response->successful()) {
                $products = $response->json()['content']['data'];
                return view('pages.products.search', compact('products', 'search'));
            } else {
                dd($response->json());
            }
        } catch (\Throwable $th) {
            dd($th);
        };
        return view('pages.products.index', compact('products'));
    }
}
