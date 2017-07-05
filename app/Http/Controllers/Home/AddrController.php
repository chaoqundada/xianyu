<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class AddrController extends Controller
{
    /**
    *用户收货地址
    */
    public function getAdd()
    {
        //获取信息
        $data = DB::table('home_user_addr') -> where('uid',session('user')['uid']) -> get();
        // dd($data);
        return view('home/addr/addr',['data'=>$data]);
    }

    /**
    *保存地址
    */
    public function postInsert(Request $request)
    {   
        //获取数据
        $data = $request -> except('_token');
        //存取uid
        $data['uid'] = session('user')['uid'];
        //执行保存
        $res = DB::table('home_user_addr') -> insert($data);
        //判断
        if($res){
             return redirect('/addr/add')->with('assuc','注册成功');
         }else{
            return redirect('/addr/add')->with('error','注册失败') -> withInput();
         }
    }
    /**
    *修改视图
    */
    public function getEdit()
    {
        //地址视图
        return view('home/addr/edit');
    }
}
