<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Sign;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;

class GoodsController extends Controller
{   
    /**
    * 上传缩略图
    * author 王武杰
    */
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

    /**
    * 保存商品数据
    * author 王武杰
    */
    public function postInsert(Request $request)
    {      
        // 获取数据
        $data = $request -> except('_token','gsmall','good_pics','yid');
        $data['gtime'] = time();
        $data['uid'] = session('user')['uid'];
        //验证规则
        $role =[
           'gname'=>'required|between:2,30',
           'gpic'=>'required|between:1,8',
           'gsmallpic'=>'required',
           'gdesc'=>'required|between:10,2000'
        ];
        //提示信息
        $mess=[
            'gname.required'=>'商品名称不能为空',
            'gname.between'=>'商品名称在2到20个字符之间',
            'gpic.required'=>'商品价格不能为空',
            'gpic.between'=>'商品价格不得超过8位',
            'gsmallpic.required'=>'必须上传商品缩略图',
            'gdesc.required'=>'必须填写商品描述',
            'gdesc.between'=>'商品描述在10到2000字符之间'
        ];
        //表单验证
        $validator =  Validator::make($data,$role,$mess);
        if($validator->passes()){
            // 将数据插入数据库
            $res = DB::table('goods') -> insertGetId($data);
            //获取鱼塘id
            $yid=$request->input('yid');
            //商品鱼塘同步
            if($yid && $res){
                $yres = DB::table('yt_good') -> insert(['yid'=>$yid,'gid'=>$res]);
                if(!$yres){
                    return back() -> withInput();
                }
            }
            // 将上传文件移动到指定目录，并以新文件名命名
            $file = Input::file('good_pics');
            if($file[0]){
                foreach($file as $v){
                    if($v->isValid()) {
                        $entension = $v->getClientOriginalExtension();//上传文件的后缀名
                        $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;

                        // 将图片上传到本地服务器
                        $path = $v->move(public_path() . '/uploads/small', $newName);
                        // 返回文件的上传路径
                        $filepath = 'uploads/small/' . $newName;
                        
                    }
                    $tmp = DB::table('gpic') -> insert(['gpath'=>$filepath,'gid'=>$res]);
                }
            }
                return redirect('goods/index');
            
        }else{
            return back() -> withInput() -> withErrors($validator);
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
        $data = DB::table('goods') -> where('gstatic','<',3) -> where('uid',session('user')['uid']) -> orderBy('gtime','desc') -> paginate(5);
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
        
        // 根据传入的ID 获取要修改的商品
        $data = DB::table('goods') -> where('gid',$id) ->first();
        
        // 将数据分配到视图
        return view('home.goods.doedit',['res'=>$newarr,'data'=>$data]);
    }

    /**
    * 保存修改数据
    * author 王武杰
    */
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
        //商品相册
        $gpic = DB::table('gpic') -> where('gid',$gid) -> get();
        //发布者
        $user=  DB::table('home_user') ->where('uid',$data['uid'])->first();
        //收藏
        $coll = DB::table('user_coll') -> where('gid',$gid) -> where('uid',session('user')['uid']) -> first();
        // 引入视图
        return view('home.goods.details',['data'=>$data,'user'=>$user,'gpic'=>$gpic,'coll'=>$coll]);
    }
    /**
    * 卖出的商品
    */
    public function getOut()
    {
        //商品状态
        $arr = [1=>'上架','下架','售出'];
        //查出所有卖出的商品
        $data = DB::table('goods')
            -> join('order','goods.gid','=','order.gid')
            -> where('goods.uid',session('user')['uid'])
            -> where('goods.gstatic',3)
            -> where('order.ostatic','<',5)
            -> paginate(5);
        //引入视图
        return view('home.goods.out',['data'=>$data,'arr'=>$arr]);
    }
    /**
    *商品发货
    */
    public function postDeliver($oid)
    {
        //修改订单状态
        $res = DB::table('order') -> where('oid',$oid) -> update(['ostatic'=>3]);
        //判断
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    /**
    *退款管理
    */
    public function getService()
    {
        //查出所有退货商品
        $data = DB::table('order')
            -> join('goosds','order.gid','=','goods.gid') 
            -> join('home_user_addr','order.huaid','=','home_user_addr.huaid') 
            -> join('home_user','order.uid','=','home_user.uid') 
            -> where('order.ostatic','=',5)
            -> where('goods.uid','=',session('user')['uid'])            
            -> orderBy('order.rtime','desc')
            -> get();
        //引入视图
        return view('home.goods.service',['data'=>$data]);
    }
    /**
    *退款
    */
    public function postAgree(Request $request,$oid)
    {
        //修改为确认退款
        $res = DB::table('order') -> where('oid',$oid) -> update(['ostatic'=>6,'ttime'=>time()]);
        //修改商品状态
        $res1 = DB::table('goods') -> where('gid',$request -> input('gid')) -> update(['gstatic'=>1]);
        //判断
        if($res && $res1){
            echo 1;
        }else{
            echo 2;
        }
    }
}
