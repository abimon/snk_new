<?php

namespace App\Http\Controllers;

use App\Models\Juice;
use App\Models\JuiceFlavour;
use Illuminate\Http\Request;

class JuiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flavours = JuiceFlavour::orderBy('name','asc')->get();
        $juices = Juice::whereIn('flavour_id', $flavours->where('status',true)->pluck('id')->toArray())->with('flavour')->orderBy('created_at','desc')->get();
        return view('dashboard.juices.index', compact('juices','flavours'));
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
    public function store(Request $request)
    {
        try {
            if($request->hasFile('cover')){
                $file = $request->file('cover');
                $path = $file->store('juices','public');
            }
            Juice::create([
                'flavour_id' => request('flavour_id'),
                'price' => request('price'),
                'size' => request('size'),
                'image_path' => $path,
            ]);
            return back()->with('success', 'Juice added successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error adding juice: '.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Juice $juice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Juice $juice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Juice $juice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Juice $juice)
    {
        //
    }
}
