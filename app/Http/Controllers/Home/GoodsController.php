<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Sign;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;

class GoodsController extends Controller
{   
    public function postUpload()
    {   

        // 将上传文件移动到指定目录，并以新文件名命名
        $file = Input::file('gsmall');
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;

            // 将图片上传到本地服务器
            $path = $file->move(public_path() . '/uploads/small', $newName);
            // 返回文件的上传路径
            $filepath = 'uploads/small/' . $newName;
            return $filepath;
        }
    }

    /**
    * 添加商品
    * author 王武杰
    */
    public function getAdd()
    {   
        // 把商品类别查询出来
        $res = DB::table('type') -> orderBy('npath') -> get();
        $newarr = [];
        if(!empty($res)){
            foreach($res as $k=>$v){
                $n = substr_count($v['npath'], '-')-2;
                $newarr[$k] = $v;
                $newarr[$k]['tname'] = str_repeat('&nbsp;',$n*8).$v['tname'];
            }                                                           
        }
        $sign= Sign::where('uid',session('user')['uid'])->get();
        $yt=[];
        if ($sign){
            foreach ($sign as $k=>$v){
                $yt[]= $v->yt()->get();
            }
        }
        // 引入视图 分配信息到视图展示页
        return view('home.goods.add',['res'=>$newarr,'yt'=>$yt]);
    }

    public function postInsert(Request $request)
    {       
        // 接收数据 除了_token  gsmall
        $data = $request -> except('_token','gsmall','yid');
        $data['gtime'] = time();
        $data['uid']=session('user')['uid'];
        // dd($data);
       
        // 将数据插入商品表
        $gid = DB::table('goods') -> insertGetId($data);
        if($gid){
            //将数据插入商品鱼塘关联表
            $res=DB::table('yt_good') -> insert(['yid'=>$request->input('yid'),'gid'=>$gid]);
            if($res){
                return redirect('goods/index');
            }else{
                return back() -> with('error','发布失败');
            }
        }else{
            return back() -> with('error','发布失败');
        }
    }

    /**
    * 商品列表展示
    * author 王武杰
    */
    public function getIndex()
    {   

        $arr = [1=>'上架','下架','售出'];
        // 查询商品
        $data = DB::table('goods') -> where('uid',session('user')['uid']) -> where('gstatic','<',3) -> orderBy('gtime','desc') -> paginate(5);
        // dd($data);
        // 引入视图
        return view('home.goods.index',['data'=>$data,'arr'=>$arr]);
    }

    /**
    * 修改发布的商品
    * author 王武杰
    */
    public function getEdit($id)
    {   
        // 把商品类别查询出来
        $res = DB::table('type') -> orderBy('npath') -> get();
        $newarr = [];
        if(!empty($res)){
            foreach($res as $k=>$v){
                $n = substr_count($v['npath'], '-')-2;
                $newarr[$k] = $v;
                $newarr[$k]['tname'] = str_repeat('&nbsp;',$n*8).$v['tname'];
            }                                                           
        }
        // dd($res);
        // 根据传入的ID 获取要修改的商品
        $data = DB::table('goods') -> where('gid',$id) ->first();
        // dd($data);
        // 将数据分配到视图
        return view('home.goods.doedit',['res'=>$newarr,'data'=>$data]);
    }

    public function postDoedit(Request $request,$id)
    {
        // 接收数据 除了_token  gsmall
        $data = $request -> except('_token','gsmall');
        // dd($data);
        // 修改
        $res = DB::table('goods') -> where('gid',$id) -> update($data);
        //判断
       if($res){
            return redirect('goods/index');
        }else{
            return back() -> with('error','发布失败');
        }
    }

    /**
    * 对商品实行下架
    * author 王武杰
    */
    public function getLower($id)
    {   
        // 获取要下架的商品数据
        $res = DB::table('goods') -> where('gid',$id) -> first();
        $res['gstatic'] = 2;
        // 修改商品的状态
        $re = DB::table('goods') -> where('gid',$id) -> update($res);
        if($re){
            return redirect('goods/index');
        }else{
            return back() -> with('error','下架失败');
        }
    }

    /**
    * 对商品实行上架
    * author 王武杰
    */
    public function getUpper($id)
    {   
        // 获取要上架的商品数据
        $res = DB::table('goods') -> where('gid',$id) -> first();
        $res['gstatic'] = 1;
        // 修改商品的状态
        $re = DB::table('goods') -> where('gid',$id) -> update($res);
        if($re){
            return redirect('goods/index');
        }else{
            return back() -> with('error','上架失败');
        }
    }

    /**
    * 删除发布的商品
    * author 王武杰
    */
    public function postDelete($id)
    {   
        // 删除对应id的商品
       $re =  DB::table('goods') -> where('gid',$id) -> delete();
     
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

    /**
    * 商品详情
    * author 王武杰
    */
    public function getDetails($gid)
    {   

        // 查询商品
        $data = DB::table('goods') -> where('gid',$gid) -> first();

        // 引入视图
        return view('home.goods.details',['data'=>$data]);
    }
}
