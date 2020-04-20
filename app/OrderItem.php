<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['name', 'description', 'qty', 'price'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
