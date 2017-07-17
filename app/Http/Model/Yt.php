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
    public function ytnotic()
    {
        return $this->hasMany('App\Http\Model\Ytnotic','yid','yid');
    }
    public function sign()
    {
        return $this->hasMany('App\Http\Model\Sign','yid','yid');
    }
    public function good()
    {
        return $this->belongsToMany('App\Http\Model\Good', 'yt_good','yid','gid');
    }
}
