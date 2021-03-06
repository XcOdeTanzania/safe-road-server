<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'image',
        'plat_no',
        'station_id',
        'report_id',
        'uid',
        'message',
    ];

    protected $dates = ['deleted_at'];
    
    public function station(){
        return $this->belongsTo(Station::class);
    }
}
