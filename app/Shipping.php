<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
	protected $fillable = [
        'user_id', 'first_name', 'last_name', 'phone', 'email', 'address', 'post_office', 'post_code', 'thana', 'district', 'country', 'order_notes',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
