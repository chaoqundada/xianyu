<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class OrderController extends Controller
{
    /**
    *订单列表
    */
    public function getIndex()
    {
        //获取订单数据

        //引入视图
        return view('home/order/order');
    }
    /**
    *退款商品列表
    */
    public function getRefund()
    {
    	//获取退款商品

    	//引入视图
    	return view('home/order/refund');
    }
}
