<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'user_id','content','club_id','signalments','hasSignaled'
    ];

    public function club()
    {
    	return $this->belongsTo('App\Models\Club');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
