<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class NavController extends Controller
{   
// 导航列表
   public function getIndex(Request $request)
   {  
      // 获取值
      
      $search = $request -> input('search','');
      $data = DB::table('nav') ->where('ntitle','like','%'.$search.'%')->paginate(5);
      $all = $request ->all();
      return view('admin.nav.index',['data'=>$data,'request'=>$all]);
    
     
   }

// 添加导航
   public function getAdd()
   {
      return view('admin/nav/add');
   }

   // 提交
   public function postInsert(Request $request)
   {    
        

        // 验证
        $this->validate($request, [
        'ntitle' => 'required',
        'nlink' => 'required|url',
        ],[

         'ntitle.required'=>'导航标题必填',
         'nlink.required'=>'导航地址必填',
         'nlink.url'=>'导航地址格式错误',   

        ]);
        
        // 接收用户提交的值
        $data = $request -> except('_token');

        
        // 处理
        $res = \DB::table('nav') -> insert($data);
        if($res){
            return redirect('admin/nav/index') -> with('success','添加成功');
        }else{
            return back() -> with('success','添加失败');
        }


   }


   // 导航删除
   public function postDel($id)  
   {
     // 删除对应id用户
     $res = DB::table('nav') -> where('nid',$id) ->delete();
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


   // 导航修改页面
   public function getEdit($id)
   {    
      //dd($id);
      $edit = DB::table('nav')->where('nid',$id)->first();

      return view('admin.nav.edit',['edit'=>$edit]);
   }  

   public function postUpdate(Request $request) 
   {
      $data =  $request-> only(['ntitle','nlink']);
      $id = $request -> input('nid');

     $res = DB::table('nav') -> where('nid',$id) -> update($data);

     if($res){
        return redirect('/admin/nav/index') -> with('success','修改成功');
     }else{
      return back() ->with('error','修改失败');
     }
   }
       
}
