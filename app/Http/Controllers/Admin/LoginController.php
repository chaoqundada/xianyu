<?php

namespace App\Http\Controllers\Admin;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    //显示登录页面
  public function getLogin()
  {
      return view('admin.login.login');
  }

  //处理登录数据
    public function postDologin(Request $request)
    {
        //闪存
        $request -> flash();
        $res = $request -> except('_token');
        //        //判断验证码
        //        if(session('code') != $res['code'])
        //        {
        //            return back() -> with('error','验证码不正确');
        //        }

        //取数据
        $data= DB::table('admin_user') -> where('uname',$res['uname']) -> first();

        //dump($data);
        //验证用户名
        if(!$data)
        {
            return back() -> with('error','用户名或密码不正确');
        }

        //验证密码
        if(!Hash::check($res['upwd'], $data['upwd']))
        {
            return back() -> with('error','用户名或密码不正确');
        }
        DB::table('admin_user')->where('uname',$data['uname'])->update(['dtime'=>time()]);
        session(['user'=>$data]);

       return redirect('/admin/user/show');

    }




    //忘记密码
    public function getForgetpwd()
    {
        return view('admin.login.forget');
    }

    //处理忘记密码
    public function postDoforget(Request $request)
    {
        $data = $request->except('_token');
        //判断验证码是否正确
        if(strtolower($data['code'])!=strtolower(session('code')))
        {
            return back()->with('error','验证码错误')->withInput();
        }
        //查询数据库
        $res = DB::table('admin_user')->where('uname',$data['uname'])->first();
        //发送邮箱

        if($res){

            self::mailto($res['email'],$res['uid'],$res['token']);
            return redirect('/admin/login/login');
        }
    }


    //接受忘记密码邮件
    public function getReupwd(Request $request)
    {
        dd($request->all());

    }

    //处理ajax
    public function postAjax(Request $request)
    {
       $flag = DB::table('admin_user')->where('uname',$request->input('uname'))->first();
       
       if($flag)
       {
        return $flag['email'];
       } 
    }


    //发送邮箱方法
    public static function mailto($email,$id,$token){
        Mail::send('admin.login.mail', ['email'=>$email,'id'=>$id,'token'=>$token],function ($m) use ($email) {
           
            $m->to($email)->subject('用户忘记密码邮件!');
        });
    }


}
