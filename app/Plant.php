<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{

    protected $fillable = [
        'name', 'user_id', 'genus_id', 'birth', 'description', 'image'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function genus() {
        return $this->belongsTo('App\Genus');
    }

    public function children() {
        return $this->hasMany('App\Child');
    }

    public function image() {
        return null;
    }
}
