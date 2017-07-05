<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
class UserController extends Controller
{
    /*
    *后台主页面
    */
    public function getShow()
    {

        //后台主页面
        return view('admin.homepage.index');
    }

    /*
    *管理员添加
    */
    public function getAdd()
    {   
       
        return view('admin/user/add');
    }

    //处理添加的数据
    public function postDoadd(Request $request)
    {
        //添加自动验证
        $this->validate($request, [
            'uname' => 'required',
            'upwd' => 'required|between:6,18',
            'reupwd' => 'required|same:upwd',
            'phone' => 'required',
            'email' => 'required|email',
        ],[
            'uname.required' => '用户名必填',
            'upwd.required' => '密码必填',
            'upwd.between' => '密码长度不正确',
            'reupwd.required' => '确认密码必填',
            'reupwd.same' => '确认密码不一致',
            'phone.required' => '手机号必填',
            'email.required' => '邮箱必填',
            'email.email' => '邮箱格式不正确',
        ]);

        $data = $request -> except('_token','reupwd');
        $data['upwd'] = Hash::make($data['upwd']);
        $data['ctime'] = time();
        $data['token'] = str_random(50);
        $flag = DB::table('admin_user')->insert($data);
        if($flag)
        {
            return redirect('/admin/user/add')->with('succee','添加成功!');

        }
        else{
            return back()->withInput();
        }

    }


    //显示用户列表页
    public function getIndex(Request $request)
    {


        $cont = $request->input('sample',5);
        $search = $request->input('search','');
        $all = $request -> all();

         //定义数组
        $arr= [1=>'普通管理员','超级管理员'];
        $brr= [1=>'正常','注销'];
        
        //查询数据
        $data = DB::table('admin_user')->where('uname','like','%'.$search.'%')->paginate($cont,$columns = ['*'], $pageName = 'page', $page =null);
//其中$cont代表每页显示数目，$columns代表查询字段，$pageName代表页码名称，$page代表第几页
    
        return view('admin.user.index',['data'=>$data,'arr'=>$arr,'brr'=>$brr,'all'=>$all,'cont'=>$cont]);
    }

    //删除用户
    public function getDel($id)
    {
        $flag = DB::table('admin_user')->where('uid',$id)->delete();

        if($flag)
        {
            return redirect('admin/user/index')->with(['id'=>$id,'succee'=>'删除成功']);
        }
        return back()->with('error','删除失败');
    }

    //修改用户
    public function getEdit($id)
    {
        $data = DB::table('admin_user')->where('uid',$id)->first();
        return view('admin.user.edit',['data'=>$data]);    
    }

    //处理修改数据
    public function postDoedit(Request $request,$id)
    {
        //处理数据
       $data = $request->except('_token');
       $flag = DB::table('admin_user') -> where('uid',$id)->update($data);
       //判断结果 
       if($flag)
       {
          return redirect('/admin/user/index')-> with('succee','修改成功!');
       }else{
          return back()->with('error','修改失败!');
       }
    }

    //退出登录
    public function getOutlogin()
    {
        $flag = session()->forget('user');
        return redirect('/admin/login/login');
    }




    //ajax验证用户
    public function getAjax(Request $request)
    {
        $uname = $request -> input('uname');
        if(empty($uname))
        {
            return 2;
        }
        $flag = DB::table('admin_user') -> where('uname',$uname)->first();
        if(!$flag)
        {
            return 1;
        }else
        {
         return 2;
        }
    }
}
