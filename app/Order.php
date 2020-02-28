<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function coupon(){
    	return $this->belongsTo(Coupon::class);
    }

    public function delivery_charge(){
    	return $this->belongsTo(DeliveryCharge::class);
    }

    public function order_detail(){
    	return $this->hasMany(OrderDetail::class, 'oder_id');
    }

    public function payment(){
    	return $this->hasOne(Payment::class);
    }

    public function order_shipping(){
    	return $this->hasOne(OrderShipping::class);
    }
}
