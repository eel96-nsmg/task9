<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
