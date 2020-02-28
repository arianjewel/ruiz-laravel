<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderShipping extends Model
{

	protected $fillable = [
        'order_id', 'first_name', 'last_name', 'phone', 'email', 'address', 'post_office', 'post_code', 'thana', 'district', 'country', 'order_notes',
    ];

    public function order(){
    	return $this->belongsTo(Order::class);
    }
}
