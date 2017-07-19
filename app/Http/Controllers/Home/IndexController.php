<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Good;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
    	$str = DB::table('dll')->first();
    	$links = DB::table('links')->get();
        $keylist = 'LIST:YT';
        $keyhash = 'HASH:YT:';
    	$ytlist =\Redis::lrange($keylist,0,-1);
        $yts=[];
    	if($ytlist){
            foreach ($ytlist as $v){
                $yts[]=\Redis::hgetall($keyhash.$v);
            }
        }
        $goods=[];
        $goods=Good::where('gstatic',1)->orderBy('gid','desc')->take(6)->get();
        $collgoods=Good::where('gstatic',1)->orderBy('gcoll','desc')->take(6)->get();
			 return view('home.homepage.index',[
												'links' =>  $links,
                                                'yts'   =>  $yts,
                                                'goods'   =>  $goods,
                                                'collgoods'   =>  $collgoods,
												]);

    	
    }

    /**
    *前台搜索功能
    *--hby
    */
    public function search(Request $request)
    {
        // dd($request->has('search'));
        //判断如果为空则返回
        if(!$request->has('search'))
        {
            return back();
        }
        //不为空则开始查询
        $data =  DB::table('goods')
                ->where('gname','like','%'.$request->input('search').'%')
                ->orwhere('gdesc','like','%'.$request->input('search').'%')
                ->orderBy('gpic','asc')
                ->paginate(8);
        // dd($data);
        $cnt = count($data,true);
        
        $arr = ['search'=>$request->input('search')];
        return view('home.goods.search',['data'=>$data,'arr'=>$arr,'cnt'=>$cnt]);
    }


}
