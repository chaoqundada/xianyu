<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class User_collController extends Controller
{
    /**
    *点击收藏
    */
    public function getColl($gid)
    {   
        //判断是否登录
        if(!session('user')){
            return 4;
        }
        //点击前判断是否存在
        $coll = DB::table('user_coll') -> where('gid',$gid) -> where('uid',session('user')['uid']) -> get();
        //判断
        if($coll){
            return 3;
        }
        //获取商品
        $goods = DB::table('goods') -> where('gid',$gid) -> first();
        //增加商品收藏量
        $res = DB::table('goods') -> where('gid',$gid) -> update(['gcoll'=>$goods['gcoll'] + 1]);
        //保存收藏表
        $res1 = DB::table('user_coll') -> insert(['gid'=>$gid,'uid'=>session('user')['uid']]);
        //判断
        if($res && $res1){
            return 1;
        }else{
            return 2;
        }
    }
    /**
    *取消收藏
    */
    public function getDelcoll($gid)
    {
        //获取商品
        $goods = DB::table('goods') -> where('gid',$gid) -> first();
        //减少商品收藏量
        $res = DB::table('goods') -> where('gid',$gid) -> update(['gcoll'=>$goods['gcoll'] - 1]);
        //删除收藏表数据
        $res1 = DB::table('user_coll') -> where('gid',$gid) -> where('uid',session('user')['uid']) -> delete();
        //判断
        if($res && $res1){
            return 1;
        }else{
            return 2;
        }
    }
}
