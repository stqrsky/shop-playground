<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $guarded = [];

    protected $fillable = ['name', 'price', 'description', 'msrp', 'stock', 'image'];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function imageUrl()
    {
        if ($this->image) {
            return \Storage::url($this->image);
        }

        return 'https://via.placeholder.com/500';
    }
}
