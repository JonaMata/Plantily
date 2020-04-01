<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{

    protected $fillable = [
        'name', 'description'
    ];

    public function genera() {
        return $this->hasMany('App\Genus');
    }
}
