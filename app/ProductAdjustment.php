<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAdjustment extends GlobalModel
{
    protected $table = 'product_adjustments';
    protected $fillable =[
        "adjustment_id", "product_id", "qty", "action"
    ];
}
