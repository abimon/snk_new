<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store()
    {
        try {
            Ingredient::create([
                'name' => request('name'),
                'quantity' => request('quantity'),
            ]);
            return back()->with('success', 'Ingredient added successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', [$th]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient)
    {
        try {
            $ingredient->delete();
            return back()->with('success', 'Ingredient deleted successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', [$th]);
        }
    }
}
