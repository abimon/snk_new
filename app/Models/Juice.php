<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juice extends Model
{
    protected $fillable = [
        'flavour_id',
        'price',
        'size',
        'image_path'
    ];

    public function flavour(){
        return $this->belongsTo(JuiceFlavour::class, 'flavour_id','id');
    }
}
