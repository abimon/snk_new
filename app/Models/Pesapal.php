<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesapal extends Model
{
    protected $fillable = [
        'user_id',
        'TransactionId',
        'merchant_reference',
        'payment_account',
        'tracking_id',
        'amount',
        'payment_method',
        'confirmation_code',
        'payment_status_description',
        'redirect_url'
    ];
}
