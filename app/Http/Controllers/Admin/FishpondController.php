<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Yt;
use App\Http\Model\Ytnotic;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FishpondController extends Controller
{
    public function getIndex(Request $request)
    {
        $keywords=$request->input('keywords','');
        $count=$request->input('count',2);
        $yts=Yt::where('yname','like','%'.$request->input('keywords').'%') ->paginate($count);
        $status=[1=>'审核中',2=>'正常',3=>'封杀'];
        return view('admin.fishpond.index',['yts'=>$yts,'status'=>$status,'keywords'=>$keywords,'count'=>$count]);
    }

    /*
     * 鱼塘审核
     * */
    public function getCheck(Request $request)
    {
        $keywords=$request->input('keywords');
        $count=$request->input('count');
        $page=$request->input('page');
        $yid=$request->input('yid');
        $res=Yt::where('yid',$yid)->update(['ystatic'=>2]);
        if($res){
            return url('admin/fishpond/index?keywords='.$keywords.'&count='.$count.'&page='.$page);
        }
    }

    /*
     * 封杀鱼塘
     * */
    public function getForceout(Request $request)
    {
        $keywords=$request->input('keywords');
        $count=$request->input('count');
        $page=$request->input('page');
        $yid=$request->input('yid');
        $res=Yt::where('yid',$yid)->update(['ystatic'=>3]);
        if($res){
            return url('admin/fishpond/index?keywords='.$keywords.'&count='.$count.'&page='.$page);
        }
    }

    /*
     * 推荐鱼塘页面
     * */
    public function getRecommend()
    {

        return view('admin.fishpond.recommend');
    }

    /*
     * 推荐鱼塘处理
     * */
    public function getDorecommend(Request $request)
    {
        $order=$request->input('ytorder');
        if($order == 1){
            $yts=Yt::orderBy('yid','desc')->where('ystatic',2)->take(6)->get();
            $arr= $yts->toarray();
            $keylist = 'LIST:YT';
            $keyhash = 'HASH:YT:';
            \Redis::del($keylist);
            foreach ($arr as $v){
                \Redis::rpush($keylist,$v['yid']);
                \Redis::hMset($keyhash.$v['yid'],$v);
            }
        }else{
            $yts=Yt::orderBy('yatt','desc')->where('ystatic',2)->take(6)->get();
            $arr= $yts->toarray();
            $keylist = 'LIST:YT';
            $keyhash = 'HASH:YT:';
            \Redis::del($keylist);
            foreach ($arr as $v){
                \Redis::rpush($keylist,$v['yid']);
                \Redis::hMset($keyhash.$v['yid'],$v);
            }
        }
    }

    /*
     * 测试redis list数据
     * */
    public function getXxxo()
    {
        dd(\Redis::lrange('LIST:YT',0,-1));
    }

}
