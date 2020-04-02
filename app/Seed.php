<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seed extends Model
{
    protected $fillable = [
        'amount',
        'price',
        'description',
        'plant_id',
    ];

    public function plant() {
        return $this->belongsTo('App\Plant');
    }
}
