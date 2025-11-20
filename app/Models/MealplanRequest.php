<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealplanRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'restrictions',
        'food_dislikes',
        'primary_health_goal',
        'medical_condition',
        'meal_included',
        'contact_mode',
        'available_people',
    ];
}
