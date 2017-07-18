@extends('admin.layout.index')
@section('content')
         
      
       <div class="alert alert-success" role="alert">{{session('success')}}</div>
              <div class="row">
                      
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">
                    <!-- 设置开始 -->
                            
                             <form method="post" id="art_form" action="/admin/config/receive" style='width:800px'class="form-horizontal" enctype="multipart/form-data">
                              <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label"  for="formGroupInputLarge">logo地址</label>
                                    <div class="col-sm-10">
                                        {{ csrf_field() }}
                                        <input readonly value="{{$config['logo']}}" type="text" name="logo" id="fishpond_thumb" style="float: left;width:599px;margin-top: -5px;margin-right: 8px;">
                                        <input type="file" name="file_upload" id="file_upload">
                                        <img src="/uploads/fishpond/{{$config['logo']}}" alt="" name="pic" id="pic" style="width:200px;display: none;" >
                                        <script>
                                            $(function () {
                                                $("#file_upload").change(function () {

                                                    uploadImage();
                                                });
                                            });
                                            function uploadImage() {
                                                //判断是否有选择上传文件
                                                var imgPath = $("#file_upload").val();
                                                if (imgPath == "") {
                                                    alert("请选择上传图片！");
                                                    return;
                                                }
                                                //判断上传文件的后缀名
                                                var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                                if (strExtension != 'jpg' && strExtension != 'gif'
                                                    && strExtension != 'png' && strExtension != 'bmp') {
                                                    alert("请选择图片文件");
                                                    return;
                                                }

                                                var formData = new FormData($('#art_form')[0]);

                                                $.ajax({
                                                    type: "POST",
                                                    url: "/admin/config/upload",
                                                    data: formData,
                                                    async: true,
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    success: function(data) {
                                                        $('#pic').attr('src','/uploads/logo/'+data);
                                                        $('#pic').show();
                                                        $('#fishpond_thumb').val(data);
                                                    },
                                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                                        alert("上传失败，请检查网络后重试");
                                                    }
                                                });
                                            }
                                        </script>
                                    </div>
                                  </div><br>
                                  <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">网站标题</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" type="text" name="title" id="formGroupInputLarge" value="{{ empty($config) ? '' : $config['title'] }}" placeholder="请输入网站标题">
                                    </div>
                                  </div><br>
                                  
                                   <div class="form-group form-group-sm">
                                    <label class="col-sm-2 control-label" for="formGroupInputSmall">网站关键字</label>
                                    <div class="col-sm-10">
                                      <input  class="form-control" type="text" name="key" id="formGroupInputSmall" value="{{ empty($config) ? '' : $config['key'] }}" placeholder="请输入关键词">
                                    </div>
                                  </div><br>
                                    <div class="form-group form-group-sm">
                                    <label class="col-sm-2 control-label" for="formGroupInputSmall">备案号</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" type="text" name="dname" id="formGroupInputSmall" value="{{ empty($config) ? '' : $config['dname'] }}" placeholder="请输入备案号">
                                    </div>
                                  </div><br>
                                  <div class="form-group form-group-sm">
                                    <label class="col-sm-2 control-label" for="formGroupInputSmall">网站描述</label>
                                    <div class="col-sm-10">
                                      <textarea name="descr" class="form-control" rows="3">{{ empty($config) ? '' : $config['descr'] }}</textarea><br>
                                  </div><br>


                                  <div class="form-group form-group-sm">
                                    <label class="col-sm-2 control-label" for="formGroupInputSmall">网站底部信息</label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" name="footer"  rows="4">{{ empty($config) ? '' : $config['footer'] }}</textarea>
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