@extends('admin.layout.index') 

@section('content')
	<div class="col-lg-12">
  <section class="panel">
    <header class="panel-heading">轮播修改</header>
    <div class="panel-body">
      <div class=" form">
        <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="/admin/slide/update" novalidate="novalidate">
        	{{ csrf_field() }} 
          <div class="form-group ">
            <label for="curl" class="control-label col-lg-2">轮播序号(Carousel ID)</label>
            <div class="col-lg-10" style="width:100px;">
              <input class="form-control valid" type="text" name="sid" value="{{$edit['sid']}}" readonly></div>
          </div>			
          <div class="form-group ">
            <label for="curl" class="control-label col-lg-2">轮播图片(Carousel picture)</label>
            <div class="col-lg-10" style="width:600px; ">
             <input type="text" name="spath" id="spath" class="form-control valid" style="width:300px;" value="{{$edit['spath']}}"><br>
             <span class="sl-custom-file">
             <input type="file" name="file_upload"  id="file_upload" value="" >
             </span>
             </div>
          </div>
          <script type="text/javascript">
                                $(function () {
                                    $("#file_upload").change(function () {
                                        uploadImage();
                                    });
                                });

                                function uploadImage() {
//                            判断是否有选择上传文件
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

                                    var formData = new FormData($('#commentForm')[0]);

                                    $.ajax({
                                        type: "post",
                                        url: "/admin/upload",
                                        data: formData,
                                        async: true,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                  
                                      // alert("上传成功");
                                            $('#pic').attr('src','/'+data);
                                            $('#pic').show();
                                            $('#pic').val(data);
                                            $('#spath').val(data);
                                        },
                                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        alert("上传失败，请检查网络后重试");
                                        }
                                    });
                                }

          </script>

          <div class="form-group ">
            <lable for="curl" class="control-label col-lg-2"></lable> 
            <img src="{{url($edit['spath'])}}" alt="" name="pic" id="pic" style=" height:150px;">
          </div>

          <div class="form-group ">
            <label for="curl" class="control-label col-lg-2">轮播地址 (Carousel address)</label>
            <div class="col-lg-10" style="width:800px;">
              <input class="form-control valid" type="text" name="surl" value="{{$edit['surl']}}"></div>
          </div>
          
          <div class="form-group ">
            <label for="curl" class="control-label col-lg-2">排序 (Sort)</label>
            <div class="col-lg-10" style="width:100px; ">
              <input class="form-control valid"  type="text" name="sort" value="{{$edit['sort']}}">
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
            
              <button class="btn btn-danger" type="submit">提交</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </section>
</div>


@endsection
