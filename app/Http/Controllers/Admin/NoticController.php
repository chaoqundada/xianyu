<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class NoticController extends Controller
{
    /**
    *   显示举报的消息
    *
    */
    public function getIndex(Request $request)
    {
        if(session('admin_notic'))
        {
            session(['admin_notic'=>null]);
        }
        
        if($request->has('a'))
        {
            $notics = DB::table('admin_notic')
            ->join('home_user', 'admin_notic.huid', '=', 'home_user.uid')
            ->join('report', 'admin_notic.reid', '=', 'report.reid')
            ->join('goods', 'admin_notic.gid', '=', 'goods.gid')
            ->select('admin_notic.astatic','admin_notic.jtime', 'report.content', 'goods.gname','home_user.uname','admin_notic.anid')
            ->where('astatic',$request->input('a'))
            ->orderBy('jtime','desc')
            ->paginate(5);
        }
        elseif($request->has('search'))
        {
            $notics = DB::table('admin_notic')
            ->join('home_user', 'admin_notic.huid', '=', 'home_user.uid')
            ->join('report', 'admin_notic.reid', '=', 'report.reid')
            ->join('goods', 'admin_notic.gid', '=', 'goods.gid')
            ->select('admin_notic.astatic','admin_notic.jtime', 'report.content', 'goods.gname','home_user.uname','admin_notic.anid')
            ->where('uname','like','%'.$request->input('search').'%')
            ->orwhere('content','like','%'.$request->input('search').'%')
            ->orwhere('gname','like','%'.$request->input('search').'%')
            ->orderBy('jtime','desc')
            ->paginate(5);
        }else{
        $notics = DB::table('admin_notic')
            ->join('home_user', 'admin_notic.huid', '=', 'home_user.uid')
            ->join('report', 'admin_notic.reid', '=', 'report.reid')
            ->join('goods', 'admin_notic.gid', '=', 'goods.gid')
            ->select('admin_notic.astatic','admin_notic.jtime', 'report.content', 'goods.gname','home_user.uname','admin_notic.anid')
            ->orderBy('jtime','desc')
            ->paginate(5);
        }
        
        
        return view('admin.notic.index',['notics'=>$notics,'search'=>$request->input('search')]);
    }
    /**
    *   显示举报的具体内容
    *
    */
    public function getShow(Request $request,$id)
    {

        //查询举报消息的商品信息
        $notics = DB::table('admin_notic')->where('anid',$id)->first();

        if($notics['astatic']==1){
            DB::table('admin_notic')->where('anid',$id)->update(['astatic'=>2]);
        }
        //查询举报的类型
        $res = DB::table('report')->where('reid',$notics['reid'])->first();
        
        //用举报信息查询商品的信息
        $goods = DB::table('goods')->where('gid',$notics['gid'])->first();
        //商品图片
        $pics = DB::table('gpic')->where('gid',$notics['gid'])->get();

        //举报人的信息
        $informter = DB::table('home_user')->where('uid',$notics['huid'])->first();
        //卖家信息
        $seller = DB::table('home_user')->where('uid',$goods['uid'])->first();
        
        //带入信息
        $arr=[
            'notics'=>$notics,
            'goods'=>$goods,
            'pics' => $pics,
            'informter'=>$informter,
            'seller'=>$seller,
            'res'=>$res,
        ];

       
        return view('admin/notic/show',$arr);
    }

    /**
    *
    *处理提交数据
    */
    public function postInsert(Request $request)
    {
        //接受数据
        $arr[0]['huid']=$request->input('seller_id');
        $arr[0]['content']=$request->input('forseller');
        $arr[0]['qtime']=time();
        $arr[1]['huid']=$request->input('mter_id');
        $arr[1]['content']=$request->input('formter');
        $arr[1]['qtime']=time();
        //循环插入数据

        $flag = DB::table('goods')->where('gid',$request->input('gid'))->update(['gstatic'=>$request->input('put')]);
        if(!$flag)
        {
            return back()->with('error','提交失败!');
        }
        $str='';
        foreach($arr as $k => $v)
        {
            $str .= DB::table('admin_que')->insertGetId($v);
        }
        if(!$str)
        {
            return back()->with('error','提交失败!');
        }

         
        return redirect('/admin/notic/index');
      
    }

    /**
    *删除邮件
    *
    */
    public function postDel(Request $request)
    {
        $arr =  $request->input('brr');
        
        $flag = DB::table('admin_notic')->whereIn('anid',$arr)->delete();
        if($flag)
        {
            return 1;
        }
        return 0;    
    }
}
