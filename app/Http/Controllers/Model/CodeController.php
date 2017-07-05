<?php

namespace App\Http\Controllers\Model;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function code()
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 150, $height = 38, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        session(['code'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

}
