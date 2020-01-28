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
    	return $this->belongsTo(Club::class);
    }

    public function User()
    {
    	return $this->belongsTo(User::class);
    }
}
