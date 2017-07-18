<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
  
    public function getIndex()
    {
        
       
        $config = DB::table('dll')->first();
    	
			return view('admin.config.index',['config' =>$config]);
    }

    //LOGO上传
    public function postUpload(Request $request)
    {
        if($request->hasFile('file_upload')) {
            // 上传 管理
            // 文件夹  文件名
            // uploads/20170622/1.jpg
            // 拼接文件夹
            $dirname = './uploads/logo/';
            // 拼接文件名
            $tmp_name = md5(time() + rand(100000, 999999));

            // 获取文件的后缀名
            $hz = $request->file('file_upload')->getClientOriginalExtension();
            // 拼接完整的文件名
            $filename = $tmp_name . '.' . $hz;
            $request->file('file_upload')->move($dirname, $filename);
            return $filename;
        }
    }
    
    public function postReceive(Request $request)
    {
        $data  = $request->except('_token','file_upload');
        $dll   = DB::table('dll')->get();
        if(empty($dll)){
            $arr   = DB::table('dll')->insert($data);
        }else{
           $arr   = DB::table('dll')->where('cid',1)->update($data); 
        }
  		if(!$arr){
  			return redirect('admin/config/index')->with('success','提示：修改网站信息失败');
		}else{
            $configs= DB::table('dll')->first();
            $str="<?php
                        return [
                            'DNAME'=>'".$configs['dname']."',
                            'TITLE'=>'".$configs['title']."',
                            'LOGO'=>'/uploads/logo/".$configs['logo']."',
                            'DESCR'=>'".$configs['descr']." ',
                            'KEY'=>'".$configs['key']."',
                            'FOOTER'=>'".$configs['footer']."',
                        ];
                        ";
            file_put_contents(base_path('config').'/dll.php',$str);
			return redirect('admin/config/index')->with('success','提示：修改网站信息成功');
    	}
 	
    
	}
    /**
    *显示举报内容填写页
    *--hby
    */
    public function getReport()
    {
        return view('admin.config.report');
    }

    /**
    *处理举报类别数据，添加到数据库中
    *--hby
    */
     public function postDoreport(Request $request)
     {
        $content=$request->except('_token');
        $content['ttime'] = time();
        
        $flag = DB::table('report')->insert($content);
        if(!$flag)
        {
            return back()->with('error','添加失败！');
        }
        return redirect('/admin/config/report')->with('succee','添加成功！');

     }

    /**
    *显示举报类别详情
    *--hby
    */

    public function getShow()
    {
        //查询表
        $data = DB::table('report')->paginate(10);
        return view('admin.config.show',['data'=>$data]);
    }
    /**
    *删除类别
    *--hby
    */

    public function getDelreport($id)
    {
        //查询表
        $flag = DB::table('report')->where('reid',$id)->delete();
        if(!$flag)
        {
            return back()->with('error','删除失败！');
        }
        return redirect('/admin/config/show')->with('succee','删除成功');
    }  

    /**
    *修改类别
    *--hby
    */
    public function getEditreport($id)
    {


        //查询表
        $data = DB::table('report')->where('reid',$id)->first();

        return view('admin.config.edit',['data'=>$data,'id'=>$id]);
    }
    /**
    *处理修改数据，添加到数据库中
    *--hby
    */
     public function postDoedit(Request $request,$id)
     {
        $content=$request->except('_token','reid');
        
        $flag = DB::table('report')->where('reid',$id)->update($content);
        if(!$flag)
        {
            return back()->with('error','修改失败！');
        }
        return redirect('/admin/config/show')->with('succee','修改成功！');

     }
   
}