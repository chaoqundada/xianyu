<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /*
    *后台主页面
    */
    public function getIndex()
    {   
        //后台主页面
        return view('admin/layout/index');
    }

}
