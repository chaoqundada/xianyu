<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    protected $table='home_user_sign';
    protected $primaryKey='husid';
    public $timestamps = false;
    protected $guarded = [];
}
