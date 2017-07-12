<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'home_user';
    protected $primaryKey = 'uid';
    public $timestamps = false;
    protected $guarded = [];

    public function quesspone()
    {
        return $this->belongsToMany('App\Http\Model\Quesspone', 'uid', 'uid');
    }
}
