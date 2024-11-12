<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProoductRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('product.index', compact('categories', 'products'));
    }

    public function products()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products.index', compact('categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProoductRequest $request)
    {
        try {
            $product = Product::create($request->validated());

            return redirect()->route('products.index')->with('success', 'Equipo Registrado');
        } catch (Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException) {
                return redirect()->back()->with('error', 'La Equpo ya existe.');
            }

            return redirect()->route('products.index')->with('success', 'Error al Registrar');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'solution' => 'nullable',
            'cost' => 'nullable'
        ]);

        $product = Product::find($id);
        $product->solution = $request->solution;
        $product->cost = $request->cost;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Equipo Listo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = "";
        $product = Product::find($id);
        if ($product->status == 1) {
            Product::where('id', $product->id)
                ->update([
                    'status' => 0
                ]);
            $message = 'Producto Entregado';
        }

        return redirect()->route('products.index')->with('success', $message);
    }
}
