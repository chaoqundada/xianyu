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
        //类别显示
        $types = DB::table('type')->where('pid','0')->get();
         $types_2 = [];
        foreach($types as $k => $v)
        {
            $types_2[]=DB::table('type')->where('pid',$v['tid'])->get();
        }
        $collgoods=Good::where('gstatic',1)->orderBy('gcoll','desc')->take(6)->get();
        $slides = DB::table('slide')->orderBy('sort','asc')->get();
        //获取二级分类
        return view('home.homepage.index',[
										'links'       =>  $links,
                                        'yts'         =>  $yts,
                                        'goods'       =>  $goods,
                                        'types'       =>  $types,
                                        'collgoods'   =>  $collgoods,
                                        'slides'      =>  $slides,
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

        if($request->has('tid'))
        {

            $data = DB::table('goods')
                ->where('tid',$request->input('tid'))
                ->orderBy('gpic','asc')
                ->paginate(8);
        }else{
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
        }
        // dd($data);
        $cnt = count($data,true);
        
        $arr = ['search'=>$request->input('search')];
        return view('home.goods.search',['data'=>$data,'arr'=>$arr,'cnt'=>$cnt]);
    }


}
