<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopItem extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];
}
