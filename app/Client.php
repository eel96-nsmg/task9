<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'company',
        'position',
        'mobile',
        'tel',
        'fax',
        'address',
        'company_address',
    ];


    public function histories()
    {
        return $this->hasMany('App\History');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function likedUsers()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }


}
