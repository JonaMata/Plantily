<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Child extends Model
{
    protected $fillable = [
        'type',
        'amount',
        'price',
        'description',
        'plant_id',
    ];

    public function typeString() {
        return Config::get('plant.children_types')[$this->type];
    }

    public function plant() {
        return $this->belongsTo('App\Plant');
    }
}
