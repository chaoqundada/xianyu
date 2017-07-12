<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {

    	$str = DB::table('dll')->first();
    	$links = DB::table('links')->get();
    	
			 return view('home.homepage.index',['title' =>$str['title'],
												'logo'=>  $str['logo'],
												'key' =>  $str['key'],
												'descr'=>$str['descr'],
												'dname' => $str['dname'],
												'footer'=>$str['footer'],
												'links' =>$links,
												]);
    	
    }


}
