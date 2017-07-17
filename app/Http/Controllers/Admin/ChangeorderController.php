<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class ChangeorderController extends Controller
{
    public function changeOrder(Request $request ,$id)
    {   
        $sort = $request->input('sort');
      //  dd($id);
        // echo $id;
         // dd($sort);
        // 找到要修改的排序记录
       $cate = DB::table('slide') ->where('sid',$id) ->update(['sort'=>$sort]);
       // 如果修改成功
       if($cate){
          $data =[
              'status'=>0,
                'msg'=>'修改成功'
            ];
       }else{
          $data =[
                'status'=>1,
                'msg'=>'修改失败'
            ];
       }

       return $data;
    }
}
