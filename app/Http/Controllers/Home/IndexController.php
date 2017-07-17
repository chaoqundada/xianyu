<?php

namespace App\Http\Controllers\Home;

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
			 return view('home.homepage.index',['title' => $str['title'],
												'logo'  =>  $str['logo'],
												'key'   =>  $str['key'],
												'descr' =>  $str['descr'],
												'dname' =>  $str['dname'],
												'footer'=>  $str['footer'],
												'links' =>  $links,
                                                'yts'   =>  $yts,
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
