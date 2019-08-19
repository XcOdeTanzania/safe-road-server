<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'id_station',
        'latitude',
        'longitude',
        'district',
        'id_district',
        'region'
    ];

    protected $dates = ['deleted_at'];
}
