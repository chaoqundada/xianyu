<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
  
    public function getIndex()
    {
        
       
        $str = DB::table('dll')->first();
    	
			return view('admin.config.index',['title' =>$str['title'],'logo'=>$str['logo'],'key'=>$str['key'],'descr'=>$str['descr'],'dname' => $str['dname'],'footer'=>$str['footer']]);
    }
    
    public function postReceive(Request $request)
    {
        $data  = $request->except("_token");
        $arr   = DB::table('dll')->update($data);
  		if(!$arr){
  			return redirect('admin/config/index')->with('success','提示：修改网站信息失败');
		}else{
			return redirect('admin/config/index')->with('success','提示：修改网站信息成功');
       
    	}
 	
    
	}
}