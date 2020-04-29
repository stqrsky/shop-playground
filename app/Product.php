<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


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
            return Storage::url($this->image);
        }

        return 'https://via.placeholder.com/500';
    }

    public function remove($rowId)
    {
        $cartItem = $this->get($rowId);

        $content = $this->getContent();

        $content->pull($cartItem->rowId);

        $this->events->fire('removeFromCart', $cartItem);

        $this->session->put($this->instance, $content);
    }
}
