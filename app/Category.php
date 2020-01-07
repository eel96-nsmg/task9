<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }
}
