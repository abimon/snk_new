<?php

namespace App\Http\Controllers;

use App\Models\MealplanRequest;
use Throwable;

class MealplanRequestController extends Controller
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
        
        $meals= json_encode([
                'breakfast'=>request('breakfast') == '1' ?true : false,
                'lunch'=>request('lunch') == '1' ? true : false,
                'supper'=>request('supper') == '1' ? true : false,
                'snacks'=>request('snacks') == '1' ? true : false,
            ]);
            $people = json_encode([
                'Breakfast' => request('breakfast_no') !=null ? request('breakfast_no') : 0,
                'Lunch' => request('lunch_no') !=null ? request('lunch_no') : 0,
                'Supper' => request('supper_no') !=null ? request('supper_no') : 0,
                'Snacks' => request('snacks_no') !=null ? request('snacks_no') : 0,
            ]);
        try{
            MealplanRequest::create([
                'name' => request('name'),
                'email' => request('email'),
                'phone' => request('phone'),
                'restrictions' => request('restrictions'),
                'food_dislikes' => request('dislikes'),
                'primary_health_goal' => request('primary_health_goal'),
                'medical_condition' => request('medical_condition'),
                'meal_included' => $meals,
                'contact_mode' => request('mode'),
                'available_people' => $people,
            ]);
            return redirect('/meal-plans')->with('success', 'Request placed successfully.');
        }
        catch(Throwable $th){
            return back()->with('error',[$th]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
