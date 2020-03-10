<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    //
    protected $fillable = [
        'name','description','address','sports',
        'city','county','postcode', 'email','phone_number','price',
        'likes','dislikes','image','user_id','hasVoted'
    ];

    public function comments()
    {
    	return $this->hasMany('App\Models\Comment');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
