<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\User;
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



    public function postDologin(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'user'    =>'required'
        ],[
            'password.required'   => '密码必填',
            'user.required'      =>'用户必填'
        ]);

        $user=$request->input('user');
        $password=$request->input('password');
        $res=User::where('uname',$user)->orwhere('phone',$user)->first();
        if($res){
            if(Hash::check($password,$res['upwd'])){
                //用户信息存入session
                session(['user'=>$res]);
                //添加登录时间
                $arr['dtime'] = time();
                $resdtime = DB::table('home_user') -> where('uid',$res['uid'])->update($arr);
                echo 1;//登录成功
            }else{
                echo 2;//密码错误
            }
        }else{
            echo 3;//用户名不存在
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
        session() -> forget('goods');
        session() -> forget('buy');
        session() -> forget('gid');
        //返回首页
    	return redirect('/');
    }
}
