<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'subject',
        'description',
        'type',
        'address',
        'area',
        'city',
        'archipelago',
        'posttype',
        'rent',
        'sell',
        'assume',
        'lease',
        'pawn',
        'amount',
        'floor', 
        'landarea',
        'housearea',
        'bedroom',
        'bathroom', 
        'garage',
        'furnished',
        'laundry',
        'terrace',
        'fence',
        'gate',
        'status',
        'installment',
        'cash',
        'map'
        
    ];
    
    public function photo()
    {
        return $this->hasMany('App\Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
