<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $guarded = [];

    protected $fillable = ['name', 'price', 'description', 'msrp', 'stock'];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
