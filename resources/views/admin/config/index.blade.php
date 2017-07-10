@extends('admin.layout.index')
@section('content')
         
      
       <div class="alert alert-success" role="alert">{{session('success')}}</div>
              <div class="row">
                      
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">
                    <!-- 设置开始 -->
                            
                             <form method="post" action="/admin/config/receive" style='width:800px'class="form-horizontal">
                              <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label"  for="formGroupInputLarge">logo地址</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" type="text" name="logo" id="formGroupInputLarge" value="{{ $logo }}" placeholder="{{ $logo }}">
                                      {{ csrf_field() }}
                                    </div>
                                  </div><br>
                                  <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">网站标题</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" type="text" name="title" id="formGroupInputLarge" value="{{ $title }}" placeholder="{{ $title }}">
                                    </div>
                                  </div><br>
                                  
                                   <div class="form-group form-group-sm">
                                    <label class="col-sm-2 control-label" for="formGroupInputSmall">网站关键字</label>
                                    <div class="col-sm-10">
                                      <input  class="form-control" type="text" name="key" id="formGroupInputSmall" value="{{ $key }}" placeholder="{{ $key }}">
                                    </div>
                                  </div><br>
                                    <div class="form-group form-group-sm">
                                    <label class="col-sm-2 control-label" for="formGroupInputSmall">备案号</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" type="text" name="dname" id="formGroupInputSmall" value="{{ $dname }}" placeholder="{{ $dname }}">
                                    </div>
                                  </div><br>
                                  <div class="form-group form-group-sm">
                                    <label class="col-sm-2 control-label" for="formGroupInputSmall">网站描述</label>
                                    <div class="col-sm-10">
                                      <textarea name="descr" class="form-control" rows="3">{{ $descr }}</textarea><br>
                                  </div><br>
                                
                                
                                  <div class="form-group form-group-sm">
                                    <label class="col-sm-2 control-label" for="formGroupInputSmall">网站底部信息</label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" name="footer"  rows="4">{{ $footer }}</textarea>
                                    </div>
                                  </div><br><br>
                                  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
                                  <input class="btn btn-info" type="submit" value="＞＞＞　　　提交　　　＜＜＜">
                                </form>
                  

                          </div>
                      </section>
                  </div> 
              </div>
              
         <!-- 设置结束 -->
     

  @endsection