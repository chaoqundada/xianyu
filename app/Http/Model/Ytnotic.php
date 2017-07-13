<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Ytnotic extends Model
{
    protected $table='ytnotic';
    protected $primaryKey='nid';
    public $timestamps = false;
    protected $guarded = [];
    public function yt()
    {
        return $this->belongsTo('App\Http\Model\Yt','yid','yid');
    }
}
