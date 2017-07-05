<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FishpondController extends Controller
{
    public function getIndex()
    {
        $user=['uid'=>1];
        session(['user'=>$user]);
        return view('home.fishpond.index');
    }
    public function getAdd()
    {
        return view('home.fishpond.add');
    }
    public function postDoadd(Request $request)
    {
        if(empty($request->input('yname')) or DB::table('yt')->where('yname','=',$request->input('yname'))->first()){
            return redirect('/myfishpond/add')->with('error','鱼塘名称已经存在');
        }
        $data['yname']=$request->input('yname');
        if($request->hasFile('ytpic')) {
            // 上传 管理
            // 文件夹  文件名
            // uploads/20170622/1.jpg
            // 拼接文件夹
            $dirname = './uploads/fishpond/' . date('Ymd', time()) . '/';
            // 拼接文件名
            $tmp_name = md5(time() + rand(100000, 999999));

            // 获取文件的后缀名
            $hz = $request->file('ytpic')->getClientOriginalExtension();
            // 拼接完整的文件名
            $filename = $tmp_name . '.' . $hz;
            $request->file('ytpic')->move($dirname, $filename);
            $data['ytpic'] = $filename;

        }else{
            return redirect('/myfishpond/add')->with('error','图片上传失败');
        }
        $data['uid']=session('user')['uid'];
        $data['city']= $request->input('P2').','.$request->input('C2');
        $inres=DB::table('yt')->insert($data);
        if($inres){
            return redirect('/myfishpond/list')->with('success','申请成功');
        }else{
            return redirect('/myfishpond/add')->with('error','申请失败');
        }

    }

    //验证注册鱼塘的名称是否存在
    public function getAjaxyname(Request $request)
    {
        if(DB::table('yt')->where('yname','=',$request->input('yname'))->first()){
            echo 1;//已经存在
        }else{
            echo 2;//未存在
        }
    }

    //鱼塘列表
    public function getList()
    {
        $uid=session('user')['uid'];
        $yts=DB::table('yt')->where('uid',$uid)->get();
        if(empty($yts)){
            return redirect('/myfishpond/add');
        }
        return view('home/fishpond/list');
    }

}
