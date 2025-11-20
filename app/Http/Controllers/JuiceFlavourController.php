<?php

namespace App\Http\Controllers;

use App\Models\JuiceFlavour;
use Illuminate\Http\Request;

class JuiceFlavourController extends Controller
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
        JuiceFlavour::create([
            'name' => request('name'),
            'description' => request('description'),
        ]);
        return back()->with('success', 'Juice flavour added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JuiceFlavour $juiceFlavour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JuiceFlavour $juiceFlavour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        // dd( request()->all());
        $flavour = JuiceFlavour::findOrFail($id);
        if(request('name')!=null){
            $flavour->name = request('name');
        }
        if(request('description')!=null){
            $flavour->description = request('description');
        }
        if(request('status')!=null){
            $flavour->status = request('status')=='1'?1:0;
        }
        $flavour->update();
        return back()->with('success', 'Juice flavour updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        JuiceFlavour::destroy($id);
        return back()->with('success', 'Juice flavour deleted successfully!');
    }
}
