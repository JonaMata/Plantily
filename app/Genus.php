<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genus extends Model
{

    protected $fillable = [
        'name', 'description', 'family_id'
    ];

    public function family() {
        return $this->belongsTo('App\Family');
    }
}
