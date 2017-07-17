@extends('home/layout/goods')
@section('content')
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<form method="post" action="{{url('goods/insert')}}" id="goods_form">
			{{csrf_field()}}
			<div class="form-group">
				<label for="exampleInputEmail1">商品分类</label>
				<select class="form-control" name="tid" style="width:200px">
					@if(!empty($res))
						@foreach($res as $v)
							<option value="{{$v['tid']}}">{{$v['tname']}}</option>	
						@endforeach
					@endif
				</select>
	        </div>
			<div class="form-group">
				<label for="exampleInputEmail1">商品名称</label>
				<input type="text" name="gname" class="form-control"  placeholder="名称" style="width:200px">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">商品价格</label>
				<input type="text" name="gpic" class="form-control" placeholder="价格" style="width:200px">
			</div>
			<div class="form-group">
			    <label for="exampleInputFile">缩略图</label>
			    <input type="hidden" name="gsmallpic" id="gsmallpic" value=''>
			    <input type="file" name="gsmall" id="exampleInputFile" value="">
				<script type="text/javascript">
				    $(function () {
				        $("#exampleInputFile").change(function () {
				            uploadImage();
				        });
				    });

				    function uploadImage() {
						//  判断是否有选择上传文件
				        var imgPath = $("#exampleInputFile").val();
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

				        var formData = new FormData($('#goods_form')[0]);

				        $.ajax({
				            type: "POST",
				            url: "/goods/upload",
				            data: formData,
				            async: true,
				            cache: false,
				            contentType: false,
				            processData: false,
				            success: function(data) {
							// console.log(data);
							// alert("上传成功");
				                $('#pic').attr('src','/'+data);
				                $('#pic').show();
				                $('#gsmallpic').val(data);
				            },
				            error: function(XMLHttpRequest, textStatus, errorThrown) {
				                alert("上传失败，请检查网络后重试");
				            }
				        });
				    }

				</script>
		  	</div>
		  	<div>
		  		<img src="" alt="" name="pic" id="pic" style="width:100px;display:none;">
		  	</div>
			<div class="form-group">
				<label for="exampleInputPassword1">商品详情</label>
				<!-- 加载编辑器的容器 -->
			    <script id="container" name="gdesc" type="text/plain" style="height:300px">
			        
			    </script>
			    <!-- 配置文件 -->
			    <script type="text/javascript" src="/homes/u/ueditor.config.js"></script>
			    <!-- 编辑器源码文件 -->
			    <script type="text/javascript" src="/homes/u/ueditor.all.js"></script>
			    <!-- 实例化编辑器 -->
			    <script type="text/javascript">
			        var ue = UE.getEditor('container');
			    </script>
		    </div>
			@if($yt)
			<div class="checkbox">
				<span>同步商品到鱼塘:</span>
				@foreach($yt as $k=>$v)
				<label class="bg-info"><input type="radio" name="yid" value="{{$v[0]['yid']}}" >{{$v[0]['yname']}}</label>
				@endforeach
			</div>
			@endif
			 
				<button type="submit" class="btn btn-primary">发布闲置</button>
		</form>
	</body>
	</html>

	
@endsection