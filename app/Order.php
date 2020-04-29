<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name'];

    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function 
}
