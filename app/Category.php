<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'cat_name', 'cat_desc'];

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
