<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\Mealplan;
use App\Models\MealplanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealplanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = MealplanRequest::orderBy('created_at', 'asc')->get();
        $mealplans = Mealplan::orderBy('created_at', 'asc')->get();
        $items = Ingredient::all();
        $meals = Meal::all();
        return view('dashboard.mealplans.index', compact('requests', 'mealplans', 'items', 'meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $days =  ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $meals = [];
        $req =MealplanRequest::findOrFail(request('request_id'));
        if(json_decode($req->meal_included)->breakfast){
            $meals[] = 'Breakfast';
        }
        if(json_decode($req->meal_included)->lunch){
            $meals[] = 'Lunch';
        }
        if(json_decode($req->meal_included)->supper){
            $meals[] = 'Supper';
        }
        if(json_decode($req->meal_included)->snacks){
            $meals[] = 'Snacks';
        }
        $_meals = Meal::all();
        $request_id = request('request_id');
        return view('dashboard.mealplans.create', compact('_meals', 'request_id', 'days', 'meals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Mealplan::create([
                'request_id' => request('request_id'),
                'Sunday_Breakfast' => request('Sunday_Breakfast'),
                'Monday_Breakfast' => request('Monday_Breakfast'),
                'Tuesday_Breakfast' => request('Tuesday_Breakfast'),
                'Wednesday_Breakfast' => request('Wednesday_Breakfast'),
                'Thursday_Breakfast' => request('Thursday_Breakfast'),
                'Friday_Breakfast' => request('Friday_Breakfast'),
                'Saturday_Breakfast' => request('Saturday_Breakfast'),
                'Sunday_Lunch' => request('Sunday_Lunch'),
                'Monday_Lunch' => request('Monday_Lunch'),
                'Tuesday_Lunch' => request('Tuesday_Lunch'),
                'Wednesday_Lunch' => request('Wednesday_Lunch'),
                'Thursday_Lunch' => request('Thursday_Lunch'),
                'Friday_Lunch' => request('Friday_Lunch'),
                'Saturday_Lunch' => request('Saturday_Lunch'),
                'Sunday_Supper' => request('Sunday_Supper'),
                'Monday_Supper' => request('Monday_Supper'),
                'Tuesday_Supper' => request('Tuesday_Supper'),
                'Wednesday_Supper' => request('Wednesday_Supper'),
                'Thursday_Supper' => request('Thursday_Supper'),
                'Friday_Supper' => request('Friday_Supper'),
                'Saturday_Supper' => request('Saturday_Supper'),
                'Sunday_Snacks' => request('Sunday_Snacks'),
                'Monday_Snacks' => request('Monday_Snacks'),
                'Tuesday_Snacks' => request('Tuesday_Snacks'),
                'Wednesday_Snacks' => request('Wednesday_Snacks'),
                'Thursday_Snacks' => request('Thursday_Snacks'),
                'Friday_Snacks' => request('Friday_Snacks'),
                'Saturday_Snacks' => request('Saturday_Snacks'),
                'created_by' => Auth::user()->id,
                'special_instructions' => request('special_instructions'),
            ]);
            return redirect()->route('mealplans.index')->with('success', 'Mealplan created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $days =  ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $meals = ['Breakfast', 'Lunch', 'Supper', 'Snacks'];
        $shoppinglist = [];
        $_foods = [];
        $mealplan = Mealplan::findOrFail($id);
        foreach ($days as $day) {
            foreach ($meals as $meal) {
                $foods = $mealplan->{$day . '_' . $meal};
                if ($foods != null) {
                    $foods = explode(', ', $foods);
                    foreach ($foods as $food) {
                        $ingredients = Meal::where('title', $food)->first()->ingredients;
                        $ins = explode(', ', $ingredients);
                        foreach ($ins as $in) {
                            $pple =  json_decode($mealplan->mrequest->meal_included)->{strtolower($meal)} == 1 ? json_decode($mealplan->mrequest->available_people)->Breakfast : 0;
                            $qty = Ingredient::where('name', $in)->first()->quantity;
                            if (!in_array($in, $_foods)) {
                                $_foods[] = $in;
                                $shoppinglist[] = ['item' => $in, 'qty' => $qty];
                            } else {
                                foreach ($shoppinglist as $index => $item) {
                                    if ($item['item'] == $in) {
                                        $shoppinglist[$index]['qty'] += $qty*$pple;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        // return $shoppinglist;
        $mealplan = Mealplan::findOrFail($id);
        return view('dashboard.mealplans.show', compact('mealplan', 'shoppinglist', 'days', 'meals'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mealplan $mealplan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mealplan $mealplan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mealplan $mealplan)
    {
        //
    }
}
