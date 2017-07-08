<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Yt extends Model
{
    protected $table='yt';
    protected $primaryKey='yid';
    public $timestamps = false;
    protected $guarded = [];

    public function ques()
    {
        return $this->hasMany('App\Http\Model\Ques','yid','yid');
    }
}
