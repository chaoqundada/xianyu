<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Quesspone extends Model
{
    protected $table='ques_spone';
    protected $primaryKey='spid';
    public $timestamps = false;
    protected $guarded = [];
    public function ques()
    {
        return $this->belongsTo('App\Http\Model\Ques','qid','qid');
    }

    public function user()
    {
        return $this->hasMany('App\Http\Model\User','uid','uid');
    }
}
