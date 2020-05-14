<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description', 'msrp', 'stock', 'image'];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function getImageAttribute($value)
    {
        if ($value) {
            return Storage::url($value);
        }

        return 'https://via.placeholder.com/500';
    }
}
