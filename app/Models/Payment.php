<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'account',
        'tracking_id',
        'method',
        'amount',
        'status'
    ];
}
