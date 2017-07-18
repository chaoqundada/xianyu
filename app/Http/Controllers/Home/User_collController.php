<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class User_collController extends Controller
{
    public function getColl($gid)
    {
        $data['gid'] = $gid;
        if (empty(session('user'))) {
            $data = [
                'status' => 2,
                'msg' =>'请先登录'
            ];
            return $data;
        }
        // 获取uid
        $data['uid'] = session('user')['uid']; 
        // 查询
        $res = DB::table('user_coll') -> where('uid',$data['uid'])->where('gid',$gid)->first();
        if(!$res){
            DB::table('user_coll') -> insert($data);
             $data = [
                'status' => 1,
                'msg' =>'已收藏'
             ];
        }else{
            DB::table('user_coll') -> where('uid',$data['uid'])->where('gid',$gid)->delete();
             $data = [
                'status' => 3,
                'msg' =>'已取消收藏'
             ];
        }
      
        return $data;
    }
}
