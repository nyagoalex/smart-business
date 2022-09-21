<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(): Response
    {
        $products = Product::with('oldestImage')
            ->select('id', 'name', 'price', 'rating', 'description')
            ->paginate(6);
        return Inertia::render('Products/Index', compact('products'));

    }


    public function show(Product $product): Response
    {
        $product->load('images');

        $relatedProducts = Product::with('oldestImage')
            ->select('id', 'name', 'price', 'rating', 'description')->inRandomOrder()->limit(4)->get();

        return Inertia::render('Products/Show', compact('product', 'relatedProducts'));
    }
}
