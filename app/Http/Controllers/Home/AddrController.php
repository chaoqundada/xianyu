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
        //自动验证
        $this -> validate($request,[
                //必填
                'name' => 'required',
                'phone'=>'required|regex:/^1[34578][0-9]{9}$/',
                'P2' => 'required', 
                'C2' => 'required', 
                'uaddr' => 'required', 
            ],[
                //判断并返回信息
                'name.required'=>'收货人必填',
                'phone.required'=>'手机号必填',
                'phone.regex'=>'手机号格式不正确',
                'P2.required'=>'省/市必填',
                'C2.required'=>'市必填',
                'uaddr.required'=>'详细地址必填',
            ]);       
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
    *修改收货地址
    */
    public function getEdit($huaid)
    {
        //修改用户的收货地址信息
        $data = DB::table('home_user_addr') -> where('huaid',$huaid) -> first();
        //地址视图
        return view('home/addr/edit',['data' => $data]);
    }
    /**
    *保存修改的地址
    */ 
    public function postDoedit(Request $request)
    {
        //接受修改后的数据
        $data = $request -> except('_token','huaid');
        //接受修改的ID
        $huaid = $request -> input('huaid');
        //执行修改
        $res = DB::table('home_user_addr') -> where('huaid',$huaid) -> update($data);
        //判断结果
        if($res){
            return redirect('/addr/add') -> with('assuc','修改成功');
        }else{
            return redirect('/addr/edit/'.$huaid) -> with('error','修改失败') -> withInput();
        } 
    }
    /**
    *修改默认收货地址
    */
    public function postStatus(Request $request,$huaid)
    {   
        //获取用户ID
        $uid = $request -> input('uid');
        //查出用户本默认的收货地址并修改为不默认
        $addr = DB::table('home_user_addr') -> where('uid',$uid) -> where('huasttic',1) -> update(['huasttic'=>2]);
        //修改为默认
        $res = DB::table('home_user_addr') -> where('huaid',$huaid) -> update(['huasttic'=>1]);
        //判断结果
        if($addr && $res){
            echo 1;
        }else{
            echo 2;
        }
    }
    /**
    *删除收货地址
    */
    public function postDelete($huaid)
    {
        //执行删除
        $res = DB::table('home_user_addr') -> where('huaid',$huaid) -> delete();

        //判断结果
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
}
