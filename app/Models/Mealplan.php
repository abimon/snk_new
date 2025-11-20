<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mealplan extends Model
{

    // $meals = ['Breakfast', 'Lunch', 'Supper', 'Snacks'];
    protected $fillable = [
        'request_id',
        'Sunday_Breakfast',
        'Monday_Breakfast',
        'Tuesday_Breakfast',
        'Wednesday_Breakfast',
        'Thursday_Breakfast',
        'Friday_Breakfast',
        'Saturday_Breakfast',
        'Sunday_Lunch',
        'Monday_Lunch',
        'Tuesday_Lunch',
        'Wednesday_Lunch',
        'Thursday_Lunch',
        'Friday_Lunch',
        'Saturday_Lunch',
        'Sunday_Supper',
        'Monday_Supper',
        'Tuesday_Supper',
        'Wednesday_Supper',
        'Thursday_Supper',
        'Friday_Supper',
        'Saturday_Supper',
        'Sunday_Snacks',
        'Monday_Snacks',
        'Tuesday_Snacks',
        'Wednesday_Snacks',
        'Thursday_Snacks',
        'Friday_Snacks',
        'Saturday_Snacks',
        'created_by',
        'special_instructions',
        'status'
    ];

    public function mrequest()
    {
        return $this->belongsTo(MealplanRequest::class, 'request_id');
    }
}
