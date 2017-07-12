<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
class UplodaController extends Controller
{
    
    public function upload(Request $request)
    {
        //将上传文件移动到指定目录,并以新文件命名
        $file = Input::file('file_upload');
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension(); // 获取文件后缀名
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
        $path = $file->move(public_path().'/uploads/slide/',$newName);
        
        //返回文件上传路径
        $dirname = 'uploads/slide/';
        $filepath = 'uploads/slide/'.$newName;
       // $request -> file('pic')->move($dirname, $newName);
        return $filepath;

        }
    }

   
}
