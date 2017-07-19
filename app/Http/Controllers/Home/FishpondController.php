<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Ques;
use App\Http\Model\Quesspone;
use App\Http\Model\Sign;
use App\Http\Model\User;
use App\Http\Model\Yt;
use App\Http\Model\Ytnotic;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FishpondController extends Controller
{

    public function getXxx()
    {
        $count= DB::table('yt')->selectRaw(' ystatic,count(*) ')->groupBy('ystatic')->get();
        dd($count);
    }
    /*
     *前台鱼塘展示
     * */
    public function getIndex(Request $request)
    {
        //还没有获取商品列表!!!!!!!!!!
        $yt=Yt::where('yid',$request->input('yid'))->where('ystatic','2')->first();
        if(empty($yt)){
            return redirect('/');
        }
        $ytnotic=Ytnotic::where('yid',$request->input('yid'))->get();
        $goods= $yt->good()->paginate(2);
        return view('home.showfishpond.index',['yt'=>$yt,'ytnotic'=>$ytnotic,'goods'=>$goods]);
    }

    public function getQueslist(Request $request)
    {
        $yt=Yt::where('yid',$request->input('yid'))->where('ystatic','2')->first();
        if(empty($yt)){
            return redirect('/');
        }
        $ytnotic=Ytnotic::where('yid',$request->input('yid'))->get();
        $ques=$yt->ques()->paginate(2);
        return view('home.showfishpond.ques',['yt'=>$yt,'ques'=>$ques,'ytnotic'=>$ytnotic]);
    }

    /*
     * 提问
     * */
    public function postAsk(Request $request)
    {
        $this->validate($request, [
            'uid' => 'required',
            'title'    =>'required',
            'content'    =>'required'
        ],[
            'uid.required'   => '请先登录brother',
            'title.required'      =>'标题必填',
            'content.required'      =>'内容必填',
        ]);
        $data=$request->all();
        $data['ftime']=time();
        $res= Ques::insert($data);
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

    /*
     * 签到
     * */
    public function getSignin(Request $request)
    {
        if(empty(session('user'))){
            return 3;//用户未登录
        }
        $sign=Sign::where('uid',session('user')['uid'])->where('yid',$request->input('yid'))->first();
        if(empty($sign)){
            $data=$request->all();
            $data['ytime']=time();
            $res= Sign::insert($data);
            if($res){
                Yt::where('yid',$request->input('yid'))->increment('yatt');
                return 1;//签到成功
            }
        }else{
            $data['ytime']=time();
            if(date('Ymd',$data['ytime']) == date('Ymd',$sign['ytime'])){
                return 2;//已经签到过了
            }
            $res=$sign->update(['ytime'=>$data['ytime']]);
            if($res){
                return 1;//签到成功
            }
        }
    }

    /*
     * 问答详情页
     * */
    public function getQuesshow(Request $request)
    {
        //必须传qid这个参数
        if(empty($request->input('qid'))){
            return back();//如果没有yid和qid就证明url是非法的直接back
        }
        //获取问答详情
        $ques= Ques::where('qid',$request->input('qid'))->first();
        $quesspone= $ques->quesspone()->get();
        $users=[];
        foreach ($quesspone as $v){
            $users[]= $v->user()->get();
        };
        //一对多获取对应的鱼塘详情
        $yt= $ques->yt()->first();
        $ytnotic=Ytnotic::where('yid',$yt->yid)->get();
        return view('home.showfishpond.quesshow',['yt'=>$yt,'ques'=>$ques,'quesspone'=>$quesspone,'users'=>$users,'ytnotic'=>$ytnotic]);
    }

    /*
     * 问答回复
     * */
    public function postQuesreply(Request $request)
    {
        if(empty(session('user'))){
            return 1;//用户要先登录才能回到问题
        }
        $data=$request->except('_token');
        $data['uid']=session('user')['uid'];
        $data['ftime']=time();
        $res=Quesspone::insert($data);
        if($res){
            return 2;//回答成功
        }
    }

    /*
     * 公告显示
     * */
    public function getYtnoticshow(Request $request)
    {
        $nid=$request->input('nid');
        $ytnotic=Ytnotic::find($nid);
        $yt= $ytnotic->yt()->first();
        return view('home.showfishpond.ytnoticshow',['yt'=>$yt,'ytnotic'=>$ytnotic]);
    }
    /**
    *鱼塘列表页
    *--hby
    */
    public function getList(Request $request)
    {
        $arr=[];
        if($request->has('search'))
        {
            $data = DB::table('yt')
                        ->where('yname','like','%'.$request->input('search').'%')
                        ->orwhere('description','like','%'.$request->input('search').'%')
                        ->paginate(3);
            $arr = ['search'=>$request->input('search')];
        }else{
            $data = DB::table('yt')->paginate(3);
        }
        
        return view('home.fishpond.showyt',['data'=>$data,'arr'=>$arr]);
    }

}
