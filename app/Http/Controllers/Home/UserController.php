<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Hash;
use DB;
use App\Http\Controllers\HttpController;

class UserController extends Controller
{
    /**
    *注册页面
    *用于用户注册
    */
    public function getAdd()
    {
        //引入注册视图
        return view('home/user/add');
    }

    /**
    * 保存注册用户
    * 保存数据库
    */
    public function postInsert(Request $request)
    {
    	//自动验证
        $this -> validate($request,[
                //必填
                'uname' => 'required|regex:/^[0-9a-zA-Z_]{6,18}$/',
                'upwd'=>'required|regex:/^[0-9a-zA-Z_\W]{6,18}$/',
                'reupwd'=>'required|same:upwd',
                'phone'=>'required|regex:/^1[34578][0-9]{9}$/', 
            ],[
                //判断并返回信息
                'uname.required'=>'用户名必填',
                'uname.regex'=>'用户名格式不正确',
                'upwd.required'=>'密码必填',
                'upwd.regex'=>'密码格式不正确',
                'reupwd.required'=>'密码必填',
                'reupwd.same'=>'确认密码必填',
                'phone.required'=>'手机号必填',
                'phone.regex'=>'手机号格式不正确',
            ]);       
         //接受验证码
        $phone_code = $request -> input('phone_code');

        //判断验证码
        if($phone_code != session('phone_code')){
            return redirect('/user/add')->with('error','验证码错误') -> withInput();
        }

         //接受数据
        $data = $request -> except('_token','reupwd','phone_code');
        //查找用户名是否存在
        $uname = DB::table('home_user') -> where('uname',$data['uname']) -> get();
        //判断用户是否存在
        if($uname){
            return redirect('/user/add')->with('uname','用户已存在') -> withInput();
        }

        //查找手机号是否存在
        $phone = DB::table('home_user') -> where('phone',$data['phone']) -> get();
        //判断手机号是否存在
        if($phone){
            return redirect('/user/add')->with('phone','手机号已存在') -> withInput();
        } 

        //hash加密
        $data['upwd'] = Hash::make($data['upwd']);
        //执行保存
        $uid = DB::table('home_user')->insertGetId($data);
        //执行详情的添加
        $res = DB::table('home_user_detil') -> insert(['uid'=>$uid,'ctime'=>time()]);
        //判断是否成功
        if($uid && $res){
            return redirect('/login/login')->with('assuc','注册成功');
        }else{
            return redirect('/user/add')->with('error','注册失败') -> withInput();
        }
    }
    /**
    *使用ajax验证用户是否存在
    */
    public function postName($uname)
    {
        //进行用户查询
        $res = DB::table('home_user') -> where('uname',$uname) -> first();
        //判断
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
     /**
    *使用ajax验证手机号是否存在
    */
    public function postTel($tel)
    {   
        //进行用户查询
        $res = DB::table('home_user') -> where('phone',$tel) -> first();
        //判断
        if($res){
            echo 1;
        }else{
            echo 2;
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
    *个人中心
    */
    public function getIndex()
    {
        return view('home/user/index');
    }
    /**
    *用户详情
    */
    public function getDetil()
    {  
        
        //获取用户详情
        $data = DB::table('home_user_detil') -> where('uid',session('user')['uid']) -> first();
        //引入视图
        return view('home/user/detil',['data'=>$data]);
    }
    /**
    *用户详情的填写
    */
    public function postDodetil(Request $request)
    {   
        //接受修改的值
        $data = $request -> except('_token','phone');
        //接受头像信息
        $photo = $request -> file();
        //判断是否修改
        if($photo){
                //文件名称
                $tmpname = md5(time()+rand(10000,99999));
                //存放图片的路径 
                $dirname = './uploads/user/'.date('Ymd',time()).'/';
                //获取文件的后缀名
                $hz = $request->file('upic')->getClientOriginalExtension();
                //上传图片的临时名称
                $picname = $tmpname.'.'.$hz;
                //图片路径
                $data['upic'] = $dirname.$picname;
                //执行保存图片
                $request ->file('upic')->move($dirname,$picname);
        }
        //生产token
        $data['token'] = str_random(50);
        //执行修改
        $res = DB::table('home_user_detil') -> update($data);
       //判断结果
        if($res){
            return redirect('/user/detil')->with('assuc','注册成功');
        }else{
            return redirect('/user/detil')->with('error','注册失败') -> withInput();
        }
    }
}
