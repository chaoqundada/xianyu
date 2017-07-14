<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ReportController extends Controller
{
    /**
    *显示举报页面
    *
    */
    public function getShow($id)
    {
         $goods = DB::table('goods')
                  ->select('gname','gdesc','gsmallpic','gpic','gid')
                  ->where('gid',$id)
                  ->first();
        
         $data = DB::table('report')->get();
         // dd($goods);
        return view('home.report',['goods'=>$goods,'data'=>$data]);
    }

    /**
    *处理举报的ajax
    *
    */
    public function getAjax(Request $request)
    {
        $data = $request->all();
        $data['huid']=session('user')['uid'];
        $data['astatic'] = 1;
        $data['jtime']=time();
        $flag = DB::table('admin_notic')->insert($data);
        if($flag)
        {   
            $arr=[
                'status'=>1,
                'msg'=>'举报成功!'
            ];

            return $arr;
        }else
        {
            $arr=[
                'status'=>2,
                'msg'=>'举报失败!'
            ];
            return $arr;
        }
    }
}
