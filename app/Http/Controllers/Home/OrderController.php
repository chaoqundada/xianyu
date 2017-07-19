<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class OrderController extends Controller
{
    /**
    *验证商品是否售出
    */
    public function postBuy($gid)
    {   
        //购买的标识
        session(['buy'=>true]);
        session(['gid'=>$gid]);
        //判断是否登录
        if(!session('user')){
            return 4;
        }
        //获取商品的信息
        $data = DB::table('goods') -> where('gid',$gid) -> first();
        if($data['uid'] == session('user')['uid']){
            return 3;
        }else if($data['gstatic'] == 3){
            return 2;
        }else if($data['gstatic'] == 2){
            return 2;
        }else{
            return 1;
        }
    }
    /**
    *想要并交易前聊聊
    */
    public function getAdd($gid)
    {    
        //跳转地址的标识
        session(['addr'=>true,'gid'=>$gid]);
        //获取商品的信息
        $data = DB::table('goods') -> where('gid',$gid) -> first();
        //获取用户收货地址
        $addr = DB::table('home_user_addr') -> where('uid',session('user')['uid']) -> get();
        // dd($addr);
        //引入视图
        return view('home/order/add',['data'=>$data,'addr'=>$addr]);
    }
    /**
    *添加订单
    */
    public function postInsert(Request $request,$gid)
    {
        //随机生成订单号
        $data['ocode'] = rand(10,99).rand(0,9).time().rand(10,99).rand(10,99);
        //获取商品ID
        $data['gid'] = $gid;
        //用户ID
        $data['uid'] = session('user')['uid'];
        //订单时间
        $data['xtime'] = time();
        //获取地址ID
        $data['huaid'] = $request -> input('huaid');
        //判断是否购买过
        $goods = DB::table('order')
            -> join('goods','order.gid','=','goods.gid')
            -> where('order.gid',$gid)
            -> get();
        //判断
        if($goods){
             //修改商品状态
            $res2 = DB::table('goods') -> where('gid',$gid) -> update(['gstatic'=>3]);
            //修改订单状态
            $res3 = DB::table('order') -> where('gid',$gid) -> update(['ostatic'=>1]);
            if($res2 && $res3){
                return 1;
            }else{
                return 2;
            }
        }else{
            //存入数据
            $res = DB::table('order') -> insert($data);
            //修改商品状态
            $res1 = DB::table('goods') -> where('gid',$gid) -> update(['gstatic'=>3]);
            //判断
            if($res && $res1){
                return 1;
            }else{
                return 2;
            }
        }
    }
    /**
    *确认付款
    */
    public function getPayment($gid)
    {
        //修改成支付成功
        $res = DB::table('order') -> where('gid',$gid) -> update(['ostatic'=>2]);
        //判断
        if($res){
            return redirect('/order/index')->with('assuc','付款成功');
        }else{
            return redirect('/order/index')->with('error','付款失败');
        }
    }
    /**
    *所有订单列表
    */
    public function getIndex()
    {
        //获取所有订单
        $data = DB::table('order')
            -> join('goods','order.gid','=','goods.gid') 
            -> join('home_user_addr','order.huaid','=','home_user_addr.huaid') 
            -> where('order.uid','=',session('user')['uid'])
            -> orderBy('order.ostatic')
            -> get();
        //待付款
        $data1 = [];
        //待发货
        $data2 = [];
        //待收货
        $data3 = [];
        //待评价
        $data4 = [];
        //遍历判断分别赋值
        foreach($data as $k => $v){
            if($v['ostatic'] == 1){
                $data1[] = $v;
            }else if($v['ostatic'] == 2){
                $data2[] = $v;
            }else if($v['ostatic'] == 3){
                $data3[] = $v;
            }else if($v['ostatic'] == 4){
                $data4[] = $v;
            }
        }
        //引入视图
        return view('home/order/order',['data'=>$data,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4]);
    }
    /**
    *确认收货
    */
    public function postReceipt($oid)
    {
        //执行修改
        $res = DB::table('order') -> where('oid',$oid) -> where('ostatic','<',4) -> where('ostatic','>',1) -> update(['ostatic'=>4,'stime'=>time()]);
        //判断
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    /**
    *申请退款
    */
    public function postFund($oid)
    {
         //执行修改
        $res = DB::table('order') -> where('oid',$oid) -> update(['ostatic'=>5,'rtime'=>time()]);
        //判断
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    /**
    *退款中
    */
    public function getRefund()
    {
        //查询出退款的商品
        $data = DB::table('order')
            -> join('goods','order.gid','=','goods.gid') 
            -> join('home_user_addr','order.huaid','=','home_user_addr.huaid') 
            -> where('order.uid','=',session('user')['uid'])
            -> where('order.ostatic','>',4)
            -> orderBy('order.ostatic')
            -> get();
        //申请退货
        $data5 = [];
        //退货完成
        $data6 = [];
         //遍历判断分别赋值
        foreach($data as $k => $v){
            if($v['ostatic'] == 5){
                $data5[] = $v;
            }else if($v['ostatic'] == 6){
                $data6[] = $v;
            }
        }
        // dd($data6);
    	//引入视图
    	return view('home/order/refund',['data5'=>$data5,'data6'=>$data6]);
    }
    /**
    *取消订单
    */
    public function postDel($gid)
    {
        //修改商品的状态
        $res1 = DB::table('goods') -> where('gid',$gid) -> update(['gstatic'=>1]);
        //删除订单
        $res = DB::table('order') -> where('gid',$gid) -> delete();
        //判断
        if($res1 && $res){
            echo 1;
        }else{
            echo 2;
        }
    }
    /**
    *收藏
    */
    public function getColl()
    {
        //获取用户的收藏
        $coll =  DB::table('goods') 
            -> join('user_coll','user_coll.gid','=','goods.gid')
            -> where('user_coll.uid',session('user')['uid'])
            -> get();
        //引入视图
        return view('home/user_coll/index',['coll'=>$coll]);
    }
}
