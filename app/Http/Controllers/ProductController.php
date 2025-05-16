<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Mark;
use App\Http\Requests\StoreUpdateProductRequest;

class ProductController extends Controller
{
    public readonly Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $products = Product::with('mark')->get();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $created = $this->product->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'expiration_date' => $request->expiration_date,
            'quantity' => $request->quantity,
            'mark_id' => $request->mark_id,
        ]);

        if ($created) {
            return response()->json($created, 201);
        }

        return response()->json(['message' => 'Erro ao cadastrar produto!'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->product->with('mark')->find($id);

        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateProductRequest $request, string $id)
    {
        $product = $this->product->find($id);

        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $product->update($request->only([
            'name', 'description', 'price', 'expiration_date', 'quantity', 'mark_id'
        ]));

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->product->find($id);

        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Produto excluído com sucesso']);
    }
}

