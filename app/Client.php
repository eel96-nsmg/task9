<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function histories()
    {
        return $this->hasMany('App\History');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
