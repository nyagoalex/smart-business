<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductAdminController extends Controller
{
    public function index(Request $request): Response
    {
        $products = Product::query()
            ->select('id', 'name','price','rating','description')
            ->when(
                $request->input('search'),
                fn ($query, $search) => $query->search($search)
            )
            ->paginate(6)
            ->withQueryString();

        return Inertia::render('Admin/Products/Index', [
            'products' => $products,
            'filters' => $request->only(['search'])
        ]);

    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $product = Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'rating' => rand(1,5),
            'colors' => [$data['colors']]
        ]);

        $product->images()->create([
            'src' => $data['image'],
            'alt' => 'product image',
            'name' => 'test',
        ]);

        return back();
    }

    public function show(Product $product)
    {
        $product->load('images');
        return Inertia::render('Admin/Products/Show', compact('product'));
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return back();
    }

    public function storeImages(StoreProductImageRequest $request, Product $product)
    {
        $product->images()->create($request->validated());
        return back();
    }

}
