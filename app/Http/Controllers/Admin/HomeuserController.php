<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class HomeuserController extends Controller
{
    /**
    *获取前台用户
    */
    public function getIndex(Request $request)
    {
        //获取所有用户
        $cont = $request->input('sample',5);
        $search = trim($request->input('search',''));
        $all = $request -> all();
        $all['search']= $search or '';
         //定义数组
        $brr= [1=>'正常','注销'];
        
        //查询数据
        $data = DB::table('home_user')->where('uname','like','%'.$search.'%')->paginate($cont,$columns = ['*'], $pageName = 'page', $page =null);
        //其中$cont代表每页显示数目，$columns代表查询字段，$pageName代表页码名称，$page代表第几页
    
        return view('admin.user.homeindex',['data'=>$data,'brr'=>$brr,'all'=>$all,'cont'=>$cont]);
        //引入视图
        // return view('admin/user/homeindex');
    }
    /**
    *修改用户状态(封杀)
    */
    public function postStatus($uid)
    {
        //执行修改
        $res = DB::table('home_user') -> where('uid',$uid) -> update(['static'=>2]);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    /**
    *解封用户
    */
    public function postUnset($uid)
    {
        //执行修改
        $res = DB::table('home_user') -> where('uid',$uid) -> update(['static'=>1]);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
}
