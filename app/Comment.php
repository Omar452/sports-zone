<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'user_id','name','content','club_id','approved'
    ];

    public function club()
    {
    	return $this->belongsTo('App\Club');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
