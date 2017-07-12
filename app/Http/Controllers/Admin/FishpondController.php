<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Yt;
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

}
