<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'x',
        'y',
        'z',
        'user_id'
    ];

    protected $dates = ['deleted_at'];
    
     public function user(){
        return $this->hasOne(User::class);
    }
}
