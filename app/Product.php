<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function brands(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function order_detail(){
    	return $this->hasMany(OrderDetail::class);
    }
}
