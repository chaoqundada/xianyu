<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /*
    *管理员添加
    */
    public function getAdd()
    {   
       
        return view('admin/user/add');
    }
}
