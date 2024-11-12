<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
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
    public function store(StoreCategoryRequest $request)
    {
        try {
            $category = Category::create($request->validated());

            return redirect()->route('category.index')->with('success', 'Categoría creada exitosamente.');
        } catch (Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException) {
                return redirect()->back()->with('error', 'La categoría ya existe.');
            }

            return redirect()->back()->with('error', 'Hubo un error al crear la categoría.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($request->validated());

            return redirect()->route('category.index')->with('success', 'Categoría actualizada exitosamente.');
        } catch (Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException) {
                return redirect()->back()->with('error', 'La categoría ya existe.');
            }

            return redirect()->back()->with('error', 'Hubo un error al actualizar la categoría.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = "";
        $category = Category::find($id);
        if ($category->status == 1) {
            Category::where('id', $category->id)
                ->update([
                    'status' => 0
                ]);
            $message = 'Categoria Desactivada';
        } else {
            Category::where('id', $category->id)
                ->update([
                    'status' => 1
                ]);
            $message = 'Categoria Activada';
        }

        return redirect()->route('category.index')->with('success', $message);
    }
}
