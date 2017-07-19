<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
   //广告列表
   public function getIndex()
   {
      $arr = DB::table('ad')->orderBy('aid', 'desc')->paginate(3); 
      return view('admin.ad.index',['arr'=>$arr]);
   }

  //广告删除
   public function postDel(Request $request)
   {
        $data  = $request->except("_token");
        $arr = DB::table('ad')->where('aid', '=', $data['aid'])->delete();
        if ($arr) {
          return redirect('/admin/ad/index') -> with('success','删除成功');
            
        }else{
            return back() -> with('error','删除失败');
           
        }
   }
   

   //修改
   public function getAlter(Request $request)
   {    
        $aid = $request->id;
        $arr = DB::table('ad')->where('aid','=',$aid)->get();
        return view('admin.ad.alter',['aid'=>$aid,'atitle'=>$arr[0]['atitle'],'acontent'=>$arr[0]['acontent']]);
   }

   public function postGoalter(Request $request)
   {
        $data['atitle']   = $request->atitle;
        $data['acontent'] = $request->editorValue;
        $aid  = $request->aid;
 
         $arr = DB::table('ad')->where('aid','=',$aid)->update($data);
         if ($arr) {
            return redirect('/admin/ad/') -> with('success','修改成功');
        }else{
            return back() -> with('error','修改失败');
        }
   }
  //添加

   public function getAdd()
   {
      return view('admin.ad.add');

   }


    public function postAdds(Request $request)
    {
        $data['atitle']   =  $request->atitle;  
        $data['acontent'] =  $request->editorValue;   
        $data['atime']    =  time();
        $arr = DB::table('ad')->insert($data);
        if ($arr) {
            return redirect('/admin/ad/') -> with('success','添加成功');
        }else{
            return back() -> with('error','添加失败');
        }

    }
}
