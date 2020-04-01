<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{

    protected $fillable = [
        'name', 'user_id', 'genus_id', 'birth', 'description'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function genus() {
        return $this->belongsTo('App\Genus');
    }

    public function seeds() {
        return $this->hasMany('App\Seed');
    }

    public function image() {
        return null;
    }
}
