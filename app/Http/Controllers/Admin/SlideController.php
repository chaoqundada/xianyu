<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class SlideController extends Controller
{
// 轮播

    // 添加轮播
    public function getAdd()
   {
      return view('admin/slide/add');
   }

   // 提交
   public function postInsert(Request $request)
   {
      // 验证
      $this -> validate($request,[
        'spath' => 'required',
        'surl' =>'required|url',
        'sort'=>'required|numeric',
        ],[

        'spath.required'=>'轮播图片必传',
        'surl.required'=>'轮播地址必填',
        'surl.url'=>'轮播地址格式错误',
        'sort.required'=>'排序必填',
        'sort.numeric'=>'排序必须填数字',
        ]);
      // 接收用户提交的值  处理token值
      $data = $request -> except('_token','file_upload');
        //dd($data);
      //处理值
        $res = DB::table('slide') ->insert($data);
      if($res){
         return redirect('admin/slide/index');
        }else{
          return back() -> with('success','添加失败');
       }
   }



   // 轮播列表
   public function getIndex(Request $request)
   {  
    $search = $request -> input('search','');
    $data = DB::table('slide')->where('spath','like','%'.$search.'%') ->orderBy('sort','asc')->paginate(5);
    $all = $request ->all();
    //dd($data);
    return view('admin/slide/index',['data'=>$data,'request'=>$all]);
   }

   // 导航删除
   public function postDel($id)
   {
    $res = DB::table('slide') -> where('sid',$id) ->delete();
    if($res){  
             // 0表示成功  其他表示失败
          $data = [
              'status' => 0,
              'msg' =>'删除成功!'  
          ];
     }else{

          $data = [
              'status' => 1,
              'msg' =>'删除失败!'
          ];    
     }

        return $data;
   }
// 

   // 修改
   public function getEdit($id)
   {
      //dd($id);
      $edit = DB::table('slide') ->where('sid',$id)->first();

      return view('admin/slide/edit',['edit'=>$edit]);

   }

   public function postUpdate(Request $request)
   {
      // $data = $request -> only(['surl','sort',''])
      // dd($request->all());
      // 根据id获取修改记录
   //    $art = DB::table('slide') -> find($id);

   //    //  根据传参获取到要修改记录
   //    $input = Input::except('_token','spath'); 
   //   // 修改
   //    $re = $art ->update($input);
   //   // 成功  失败  
   //    if($re){  
   //        return redirect('admin/slide/index');
   // }else{
   //       return back()->with('error','修改失败');
   // }

      $data =  $request-> only(['surl','sort','spath']);
      $id = $request -> input('sid');
      //dd($request->all());
     $res = DB::table('slide') -> where('sid',$id) -> update($data);
     // dd($res);
     if($res){
        return redirect('admin/slide/index');
     }else{
      return back() ->with('error','修改失败');
     }

  }


}
