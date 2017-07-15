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
        return view('home.user.report',['goods'=>$goods,'data'=>$data]);
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

    /**
    *个人举报内容页
    *
    */
    public function getIndex()
    {
        $data = DB::table('admin_notic')
        ->join('goods','admin_notic.gid','=','goods.gid')
        ->join('report','admin_notic.reid','=','report.reid')
        ->where('huid',session('user')['uid'])
        ->whereNull('udel')
        ->select('goods.gname','admin_notic.jtime','goods.gdesc','goods.gsmallpic','admin_notic.anid','goods.gid','report.content')
        ->orderBy('jtime','asc')
        ->paginate(3);

    
       return view('home.user.myreport',['data'=>$data]);
    }
    /**
    *  处理删除的ajax请求
    *
    */
    public function postDel(Request $request)
    {
        // dd($request->all());
        $flag = DB::table('admin_notic')->where('anid',$request->input('anid'))
                ->update(['udel'=>'1']);
         if($flag)
        {   
            $arr=[
                'status'=>1,
                'msg'=>'删除成功!'
            ];

            return $arr;
        }else
        {
            $arr=[
                'status'=>2,
                'msg'=>'删除失败!'
            ];
            return $arr;
        }       

    }
}
