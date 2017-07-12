<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Yt;
use App\Http\Model\Ytnotic;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MyfishpondController extends Controller
{
    public function getIndex()
    {
        $res= DB::table('yt')->where('uid','=',session('user')['uid'])->get();
        if(empty($res)){
            return redirect('/myfishpond/add');
        }else{
            return redirect('/myfishpond/list');
        }
    }
    public function getAdd()
    {
        return view('home.fishpond.add');
    }
    public function postDoadd(Request $request)
    {
        if(empty($request->input('yname'))){
            return redirect('/myfishpond/add')->with('error','鱼塘名称必填');
        }
        if(DB::table('yt')->where('yname','=',$request->input('yname'))->first()){
            return back()->with('error','鱼塘名称已经存在');
        }
        if(empty($request->input('ytpic'))){
            return redirect('/myfishpond/add')->with('error','请上传鱼塘封面');
        }
        $data['yname']=$request->input('yname');
        $data['description']=$request->input('description');
        $data['ytpic']=$request->input('ytpic');
        $data['uid']=session('user')['uid'];
        $data['sheng']=$request->input('sheng');
        $data['shi']=$request->input('shi');
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


    //鱼塘封面上传
    public function postUpload(Request $request)
    {
        if($request->hasFile('file_upload')) {
            // 上传 管理
            // 文件夹  文件名
            // uploads/20170622/1.jpg
            // 拼接文件夹
            $dirname = './uploads/fishpond/';
            // 拼接文件名
            $tmp_name = md5(time() + rand(100000, 999999));

            // 获取文件的后缀名
            $hz = $request->file('file_upload')->getClientOriginalExtension();
            // 拼接完整的文件名
            $filename = $tmp_name . '.' . $hz;
            $request->file('file_upload')->move($dirname, $filename);
            return $filename;

        }
    }


    //鱼塘列表
    public function getList(Request $request)
    {
        $uid=session('user')['uid'];
        //如果没有申请鱼塘就跳转到鱼塘申请页面
        /*if(empty($yts)){
            return redirect('/myfishpond/add');
        }*/
        //如果请求带有keywords说明通过查询进入此方法,否则是直接点击链接进入的
        if($request->has('keywords')){
            $yts=DB::table('yt')->where('yname','like','%'.$request->input('keywords').'%')->where('uid',$uid)->paginate(2);
            $status=[1=>'审核中',2=>'正常',3=>'封杀'];
            return view('home/fishpond/list',['yts'=>$yts,'status'=>$status,'keywords'=>$request->input('keywords')]);
        }else{
            $yts=DB::table('yt')->where('uid',$uid)->paginate(2);
            $status=[1=>'审核中',2=>'正常',3=>'封杀'];
            return view('home/fishpond/list',['yts'=>$yts,'status'=>$status,'keywords'=>$request->input('keywords')]);
        }

    }

    //修改鱼塘页面
    public function getEdit(Request $request)
    {
        $yid=$request->input('yid');
        $data= DB::table('yt')->where('yid',$yid)->first();

        return view('home.fishpond.edit',['data'=>$data]);
    }

    //修改鱼塘操作
    public  function postDoedit(Request $request)
    {
        if(empty($request->input('yname'))){
            return back()->with('error','鱼塘名称必填');
        }
        if(DB::table('yt')->where('yname','=',$request->input('yname'))->where('yid','!=',$request->input('yid'))->first()){
            return back()->with('error','鱼塘名称已经存在');
        }
        $data['yname']=$request->input('yname');
        $data['description']=$request->input('description');
        $data['ytpic']=$request->input('ytpic');
        $data['sheng']=$request->input('sheng');
        $data['shi']=$request->input('shi');
        $res=DB::table('yt')->where('yid',$request->input('yid'))->update($data);
        if($res){
            return redirect('/myfishpond/list')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    public function getManage(Request $request)
    {
        if(empty(session('user'))){
            return redirect('/login/login');
        }
        $uid=session('user')['uid'];
        $yid=$request->input('yid');
        $yt= Yt::where('uid', $uid)->where('yid',$yid)->first();
        if(empty($yt)){
            return redirect('/');
        }
        $ytnotic=$yt->ytnotic()->paginate(2);
        return view('home.fishpond.managenotice',['yt'=>$yt,'ytnotic'=>$ytnotic]);
    }

    /*
     * 公告添加
     * */
    public function postAddnotice(Request $request)
    {
        $this->validate($request, [
            'title'    =>'required',
            'content'    =>'required'
        ],[
            'title.required'      =>'标题必填',
            'content.required'      =>'内容必填',
        ]);
        $data=$request->except('_token');
        $data['fctime']=time();
        $res= Ytnotic::insert($data);
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

    /*修改公告页面
     * */
    public function getYtnoticedit(Request $request)
    {
        $ytnotic= Ytnotic::find($request->input('nid'));
        $yt=$ytnotic->yt()->first();
        return view('home.fishpond.ytnoticedit',['ytnotic'=>$ytnotic,'yt'=>$yt]);
    }

    /*
     * 公告修改处理
     * */
    public function postDoytnoticedit(Request $request)
    {
        $data['content']=$request->input('content');
        $data['title']=$request->input('title');
        $nid=$request->input('nid');
        $res= Ytnotic::where('nid',$nid)->update($data);
        if($res){
            return 2;
        }
    }

    public function postYtnoticdel(Request $request)
    {
        $nid=$request->input('nid');
        $res= Ytnotic::where('nid',$nid)->delete();
        $data=[];
        if($res){
            $data['status']=0;
            $data['msg']='删除成功';
        }else{
            $data['status']=1;
            $data['msg']='删除失败';
        }
        return $data;
    }

}
