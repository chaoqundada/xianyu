<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Hash;

class LoginController extends Controller
{
    /**
    *用户登录
    */
    public function getLogin()
    {
        //引入登录视图
        return view('home/login/login');
    }

    /**
    * 验证用户
    */
    public function postDologin(Request $request)
    {
    	//获取登录信息
    	$data = $request -> all();
    	//查询是否存在
    	$user = DB::table('home_user')->where('uname',$data['uname'])
    			->orwhere('phone',$data['uname'])->first();
    	//判断用户是否存在
    	if(!$user){
    		return back() -> with('error','用户不存在');
    	}
        //判断用户是否被封号
        if($user['static'] == 2){
            return back() -> with('error','禁止登录');
        }
    	//验证秘密
    	if(Hash::check($data['upwd'],$user['upwd'])){
    			//用户信息存入session
                session(['user'=>$user]);
                //添加登录时间
                $arr['dtime'] = time(); 
                $res = DB::table('home_user') -> where('uid',$user['uid'])->update($arr);
                if($res){
                    if(session('detil')){
                        return redirect('/user/index');
                    }
                	return redirect('/');
                }
                
            }else{
                return redirect('/login/login') -> withinput() -> with('error','用户或密码错误');
            }
    }

    /**
    *退出登录
    */
    public function getOutlogin()
    {   
        //删除session
        session() -> forget('user');
        session() -> forget('detil');
        //返回首页
    	return redirect('/');
    }
}
