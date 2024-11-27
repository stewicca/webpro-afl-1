<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = collect(range(1, 20))->map(function ($id) {
            return [
                'id' => $id,
                'name' => "Product $id",
                'description' => "Description for product $id",
                'price' => rand(1000, 10000),
            ];
        });

        return view('products.list', compact('products'));
    }

    public function create()
    {
        return view('products.form', ['action' => route('products.store')]);
    }

    public function store(Request $request)
    {
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $product = [
            'id' => $id,
            'name' => "Product $id",
            'description' => "Description for product $id",
            'price' => rand(1000, 10000),
        ];

        return view('products.form', [
            'action' => route('products.update', $id),
            'product' => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function show($id)
    {
        $product = [
            'id' => $id,
            'name' => "Product $id",
            'description' => "Description for product $id",
            'price' => rand(1000, 10000),
        ];

        return view('products.show', compact('product'));
    }
}
