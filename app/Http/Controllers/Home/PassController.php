<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Hash;
use App\Http\Controllers\HttpController;

class PassController extends Controller
{
    /**
    *显示安全设置
    */
    public function getSecurity()
    {   
        //获取用户头像
        $data = DB::table('home_user_detil') -> where('uid',session('user')['uid']) -> first();
        //引入视图
        return view('home/password/security',['data'=>$data]);
    }
    /**
    *修改密码页面
    */
    public function getModify()
    {
        //引入视图
        return view('home/password/modify');
    }
    /**
    *使用ajax验证原密码是否正确
    */
    public function postUpwd($upwd)
    {
        //获取用户数据库中的原密码
        $data = DB::table('home_user') -> where('uid',session('user')['uid']) -> first();
        //验证原密码是否正确
        if(Hash::check($upwd,$data['upwd'])){
            echo 1;
        }else{
            echo 2;
        }
    }

    /*
    *保存修改密码
    */
    public function postDomodify(Request $request)
    {   
        //自动验证
        $this -> validate($request,[
                //必填
                'upwd'=>'required|regex:/^[0-9a-zA-Z_\W]{6,18}$/',
                'password'=>'required|regex:/^[0-9a-zA-Z_\W]{6,18}$/',
                'repassword'=>'required|same:password',
            ],[
                //判断并返回信息
                'upwd.required'=>'原密码必填',
                'upwd.regex'=>'原密码格式不正确',
                'password.required'=>'新密码必填',
                'repassword.required'=>'确认密码必填',
                'repassword.same'=>'确认密码必填',
            ]);
        //获取原密码
        $upwd = $request -> input('upwd');
        //获取新密码
        $password = $request -> input('password');
        if($upwd == $password){
            return back() -> with('error','不能与原密码相同');
        }
        //获取用户数据库中的原密码
        $data = DB::table('home_user') -> where('uid',session('user')['uid']) -> first();
        //验证原密码是否正确
        if(Hash::check($upwd,$data['upwd'])){
            //执行修改
            $res = DB::table('home_user') -> where('uid',session('user')['uid']) -> update(['upwd' => Hash::make($password)]);
            //判断结果
            if($res){
                //修改成功视图
                return view('home/password/password',['status'=>'密码重置成功','url'=>'/login/login','addr'=>'重新登录']);
                // return view('home/password/password') -> with('arr',['status'=>'密码重置成功','url'=>'/login/login']);
                // 'addr'=>'点击重新登录'
            }else{
                return back() -> with('error','修改失败');
            }
        }else{
            return back() -> with('error','原密码错误');
        }
    }
    /**
    *修改完成页面
    */
    public function getPass()
    {
         return view('home/password/password');
    }

    /**
    *修改手机号
    */
    public function getEditphone()
    {
        //引入视图
        return view('home/password/phone');
    }
    /**
    *执行修改
    */
    public function postInsert(Request $request)
    {
        //自动验证
        $this -> validate($request,[
                //必填
                'phone'=>'required|regex:/^1[34578][0-9]{9}$/', 
            ],[
                //判断并返回信息
                'phone.required'=>'手机号必填',
                'phone.regex'=>'手机号格式不正确',
            ]);

        //接受验证码
        // $phone_code = $request -> input('phone_code');

        //判断验证码
        // if($phone_code != session('phone_code')){
        //     return back() -> with('error','验证码错误') -> withInput();
        // }

        //获取新手机号
        $phone = $request -> input('phone');
        //执行修改
        $res = DB::table('home_user') -> where('uid',session('user')['uid']) -> update(['phone'=>$phone]);
        //判断
        if($res){
            //修改成功视图
            return view('home/password/password',['status'=>'手机号更改成功','url'=>'/pass/security','addr'=>'返回安全设置']);
        }else{
            return back() -> with('error','修改失败');
        }
    }
    /**
    *使用ajax获取验证码
    */
    public function getPhone(Request $request)
    {  
        $phone = $request -> input('phone');
        //echo $phone;
        $res = self::phoneto($phone);
        echo $res;
    }
    /**
    *手机验证码
    */
    public static function phoneto($phone)
    {   
        //验证码的随机数
        $phone_code = rand(1000,9999);
        //存入session
        session(['phone_code'=>$phone_code]);
        //执行发送
        $str = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C59933801&password=0808facc111416683d2ea903f063ef5a&format=json&mobile='.$phone.'&content=您的验证码是：'.$phone_code.'。请不要把验证码泄露给其他人。';
        //返回值
        $res = HttpController::get($str);
        return $res;
    } 
    /**
    *忘记密码
    */
    public function getForget()
    {
        //引入视图
        return view('home/password/forget');
    }
    /**
    *忘记密码保存
    */
    public function postDoforget(Request $request)
    {
        //自动验证
        $this -> validate($request,[
                //必填
                'phone'=>'required|regex:/^1[34578][0-9]{9}$/', 
                'upwd'=>'required|regex:/^[0-9a-zA-Z_\W]{6,18}$/',
                'repassword'=>'required|same:upwd',
            ],[
                //判断并返回信息
                'phone.required'=>'手机号必填',
                'phone.regex'=>'手机号格式不正确',
                'upwd.required'=>'原密码必填',
                'upwd.regex'=>'原密码格式不正确',
                'repassword.required'=>'确认密码必填',
                'repassword.same'=>'确认密码必填',
            ]);
        //接受验证码
        $phone_code = $request -> input('phone_code');

        //判断验证码
        if($phone_code != session('phone_code1')){
            return back() -> with('error','验证码错误') -> withInput();
        }
        //获取密码
        $upwd = $request -> input('upwd');
        //获取手机后
        $phone = $request -> input('phone');
        //执行修改
        $res = DB::table('home_user') -> where('phone',$phone) -> update(['upwd'=>Hash::make($upwd)]);
        //判断
        if($res){
                //修改成功视图
                return view('home/password/password',['status'=>'密码重置成功','url'=>'/login/login','addr'=>'请登录']);
            }else{
                return back() -> with('error','重置失败');
            }
    }
     /**
    *使用ajax获取验证码
    */
    public function getPhone1(Request $request)
    {  
        $phone = $request -> input('phone');
        //echo $phone;
        $res = self::phoneto1($phone);
        echo $res;
    }
    /**
    *手机验证码
    */
    public static function phoneto1($phone)
    {   
        //验证码的随机数
        $phone_code = rand(1000,9999);
        //存入session
        session(['phone_code1'=>$phone_code]);
        //执行发送
        $str = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C59933801&password=0808facc111416683d2ea903f063ef5a&format=json&mobile='.$phone.'&content=您的验证码是：'.$phone_code.'。请不要把验证码泄露给其他人。';
        //返回值
        $res = HttpController::get($str);
        return $res;
    } 
}
