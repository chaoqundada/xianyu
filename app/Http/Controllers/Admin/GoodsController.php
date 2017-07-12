<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class GoodsController extends Controller
{
    /**
     * 商品列表
     * author: 王武杰
     */
    public function getIndex()
    {	
    	// 查询商品所有数据
    	$data = DB::table('goods') -> orderBy('gtime','desc') -> paginate(5);;
    	
    	// 把数据发送到视图
        return view('admin.goods.index',['data'=>$data]);
    }

    /**
     * 商品列表
     * author: 王武杰
     */
    public function postDelete($gid)
    {
    	 // 删除对应id的商品

    	
       $re =  DB::table('goods') -> where('gid',$gid) -> delete();
     
        // 0表示成功 其他表示失败
       if($re){
           $data = [
                'status'=>0,
                'msg'=>'删除成功！'
           ];
       }else{
           $data = [
               'status'=>1,
               'msg'=>'删除失败！'
           ];
       }
       return $data;
    }
}
