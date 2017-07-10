<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Ques extends Model
{
    protected $table='ques';
    protected $primaryKey='qid';
    public $timestamps = false;
    protected $guarded = [];
    public function yt()
    {
        return $this->belongsTo('App\Http\Model\Yt','yid','yid');
    }
    public function quesspone()
    {
        return $this->hasMany('App\Http\Model\Quesspone','qid','qid');
    }
}
