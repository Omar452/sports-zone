<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    //
    protected $fillable = [
        'name','speciality','description','address',
        'town','county','postcode', 'email','phone_number',
        'images','user_id'
    ];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
}
