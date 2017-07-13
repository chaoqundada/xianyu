<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 显示后台主页
     *
     * 
     */
    public function Show()
    {
          //后台主页面
        return view('admin.homepage.index');
    }

}
