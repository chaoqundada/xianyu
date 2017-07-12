<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class TgoodsController extends Controller
{
    /**
     * 添加商品分类
     * author: 王武杰
     */
    public function getAdd()
    {   
        // 查询分类信息 
        $res = DB::table('type') -> orderBy('npath') -> get();
        if(!empty($res)){
            foreach($res as $k=>$v){
                $n = substr_count($v['npath'], '-')-2;
                $newarr[$k] = $v;
                $newarr[$k]['tname'] = str_repeat('&nbsp;',$n*8).$v['tname'];
            }                                                           
        }
        // 返回视图 分配信息到视图展示页
        return view('admin.tgoods.add',['res'=>$newarr]);
    }

    public function postInsert(Request $request)
    {   
        // 获取表单提交过来的数据
        $data = $request -> except('_token');
        if($data['pid'] == 0){
            $data['path'] = '0'.'-';
        }else{
            $t = DB::table('type') -> where('tid',$data['pid']) -> first();
            $data['path'] = $t['npath'];
        }
        // 插入数据获取ID
        $tid = DB::table('type') -> insertGetId($data);
        $npath = $data['path'].$tid.'-';
        
        // 修改信息 把npath加入
        $p = DB::table('type') -> where('tid',$tid) -> update(['npath'=>$npath]);
        // 判断结果
        if($p){
            return redirect('/admin/tgoods/add');
        }else{
            return back() -> with('error','添加失败');
        }
        
    }

    /**
     * 商品分类显示
     * author: 王武杰
     */
    public function getIndex()
    {   
        // 获取数据
        $data = DB::table('type') -> orderBy('npath') -> get();
        if(!empty($data)){
            foreach($data as $k=>$v){
                $n = substr_count($v['npath'], '-')-2;
                $newarr[$k] = $v;
                $newarr[$k]['tname'] = str_repeat('&nbsp;',$n*16).$v['tname'];
            }                                                           
        }
        // 分配数据到视图
        return view('admin/tgoods/index',['data'=>$newarr]);
    }

    /**
     * 删除分类
     * author: 王武杰
     */
    public function getDelete($tid)
    {   
        // 判断分类下面是否有子类
        $a = DB::table('type') -> where('pid',$tid)->get();
        if($a){
            return back() -> with('error','该分类下有子类,不能删除');
        }
        // 执行删除
        $res = DB::table('type') ->where('tid',$tid) -> delete();
        // 判断是否删除成功
        if($res){
            return redirect('/admin/tgoods/index');
        }else{
            return back() -> with('error','删除失败');
        }
    }

    /**
     * 修改分类
     * author: 王武杰
     */
    public function getEdit($tid)
    {
        // 获取修改的数据
        $data = DB::table('type') -> where('tid',$tid) -> first();
        // 修改的类名
        $tname = $data['tname'];
        // ID
        $tid = $data['tid'];
        // 获取分类信息
        $arr =  DB::table('type') -> where('tid',$data['pid']) -> first();
        // 父类名称
        $pname = empty($arr) ? '添加分类' : $arr['tname'];
        // 父类ID
        $pid = empty($arr) ? '0' : $arr['tid'];
        // 引入视图
        return view('admin/tgoods/edit',['tname'=>$tname,'pname'=>$pname,'tid'=>$tid,'pid'=>$pid]);
    }

    public function postDoedit(Request $request)
    {    
        // 要修改的ID
        $tid = $request -> input('tid');
        // 修改后的值
        $tname = $request -> input('tname');
        // 执行修改
        $res = DB::table('type') -> where('tid',$tid) -> update(['tname'=>$tname]);
       
        //判断
        if($res){
            return redirect('/admin/tgoods/index');
        }else{
            return back() -> with('error','修改失败');
        }
    }

}
