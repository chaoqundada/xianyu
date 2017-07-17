<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table='goods';
    protected $primaryKey='gid';
    public $timestamps = false;
    protected $guarded = [];
}
