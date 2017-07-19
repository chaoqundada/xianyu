<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinksController extends Controller
{   //查询
    public function getIndex()
    {
        $arr   = DB::table('links')->get();  
        return view('admin.links.links',['arr' =>$arr]);

    }
    //添加
    public function postAdd(Request $request)
    {

        $this->validate($request, [
            'lname' => 'required',
            'lurl' => 'required',
        ],[
            'lname.required' => '站点名必填',
            'lurl.required' => 'url必填',
        ]);
        $data  = $request->except("_token");
        $arr   = DB::table('links')->insert($data);
         
    }
    //删除
    public function postDel(Request $request)
    {   $data  = $request->except("_token");
        
        $arr = DB::table('links')->where('lid', '=', $data['lid'])->delete();
        if ($arr) {
          return redirect('/admin/links/') -> with('success','删除成功');
        }else{
            return back() -> with('error','删除失败');
        }
    }
    //修改模板数据获取
    public function getAlter(Request $request)
    {
        $id    = $request->id;
        $arr   = DB::table('links')->where('lid','=',$id)->get();
        $lname = $arr[0]['lname'];
        $lurl  = $arr[0]['lurl'];
        
        return view('admin.links.alter',['lname'=>$lname,'lurl'=>$lurl,'lid'=>$id]);
    }

    public function postDoalter(Request $request)
    {   $id    = $request['lid'];
        $data  = $request->except("_token","lid");
       
         $arr  =  DB::table('links')->where('lid','=',$id)->update($data);
       if ($arr) {
          return redirect('/admin/links/') -> with('success','修改成功');
        }else{
           return redirect('admin/links/alter/?id='.$id)->with('success','提示：修改失败');
        }
    }

}
