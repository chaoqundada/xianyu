<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function getIndex(Request $request)
    {
        $aid= $request->input('aid');
        $ad= DB::table('ad')->where('aid',$aid)->first();
        $ads= DB::table('ad')->get();
        return view('home.blog.index',['ad'=>$ad,'ads'=>$ads]);
    }
}
