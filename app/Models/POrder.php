<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class POrder extends Model
{
    protected $fillable = [
        "user_id",
        "product_id",
        'type',
        "quantity",
        "isDelivered",
        "delivery_date",
        "isPaid",
        "receipt_no",
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id","id");
    }
    public function juice()
    {
        return $this->belongsTo(Juice::class, "product_id", "id");
    }
    public function product(){
        return $this->belongsTo(Product::class, "product_id","id");
    }
    public function pesapal(){
        return $this->hasOne(Pesapal::class, "TransactionId","receipt_no");
    }
}
