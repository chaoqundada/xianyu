@extends('home/layout/goods')
@section('content')
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<form method="post" action="{{url('goods/insert')}}" id="goods_form" enctype="multipart/form-data"
>
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
				<input type="text" name="gname" class="form-control" id="gname" value="{{old('gname')}}" placeholder="名称2-20汉字" style="width:200px">
				<font id="font1" style="color:red;height:20px;display:block;">
					@if($errors -> has('gname'))
						@foreach($errors -> get('gname') as $v)
							{{$v}}
						@endforeach
					@endif
				</font>
			</div>
			<span class='span' id='span1'>
			</span>
			<div class="form-group">
				<label for="exampleInputPassword1">商品价格</label>
				<input type="number" name="gpic" id="gpic" class="form-control" value="{{old('gpic')}}" placeholder="价格" style="width:200px">
				<font id="font2" style="color:red;height:20px;display:block;">
					@if($errors -> has('gpic'))
						@foreach($errors -> get('gpic') as $v)
							{{$v}}
						@endforeach
					@endif
				</font>
			</div>
			<div class="form-group">
			    <label for="exampleInputFile">缩略图</label>
			    <input type="hidden" name="gsmallpic" id="gsmallpic" value="{{old('gsmallpic')}}">
			    <input type="file" name="gsmall" id="exampleInputFile" value="">
			    <font id="font3" style="color:red;height:20px;display:block;">
					@if($errors -> has('gsmallpic'))
						@foreach($errors -> get('gsmallpic') as $v)
							{{$v}}
						@endforeach
					@endif
				</font>
		  	</div>
		  	
		  	<div>
		  		<img src="" alt="" name="pic" id="pic" style="width:100px;display:none;">
		  	</div>
		  	<div class="form-group">
			    <label for="exampleInputFile">商品详情图</label>
			    
			    <input type="file" class="tpl-form-input" id="user-name" name="good_pics[]" placeholder="点击上传商品详情图片" multiple>

		  	</div>
			<div class="form-group" id="div">
				<label id="xoxo" for="exampleInputPassword1">商品详情</label>
				<!-- 加载编辑器的容器 -->
			    <script id="container" name="gdesc" value="{{old('gdesc')}}" type="text/plain" style="height:300px">
			        
			    </script>
			    <!-- 配置文件 -->
			    <script type="text/javascript" src="/homes/u/ueditor.config.js"></script>
			    <!-- 编辑器源码文件 -->
			    <script type="text/javascript" src="/homes/u/ueditor.all.js"></script>
			    <!-- 实例化编辑器 -->
			    <script type="text/javascript">
			        var ue = UE.getEditor('container');
			        ue.addListener('blur',function(){
						if(ue.getContent()){
							$('#xoxo').html('商品详情');
			    			return true;
			    		}else{
			    			//提示需要填入描写信息
			    			$('#font4').text('请填写商品详情描述' );
			    			return false;
			    		}
					});
			    </script>
			    <font  id="font4"  style="color:red;height:20px;display:block;">
					@if($errors -> has('gdesc'))
						@foreach($errors -> get('gdesc') as $v)
							{{$v}}
						@endforeach
					@endif
				</font>
		    </div>
			<div class="checkbox">
				<span>同步商品到鱼塘:</span>
				<label class="bg-info"><input type="checkbox" >华文学院</label>
				<label class="bg-info"><input type="checkbox">爱陶瓷鱼塘</label>
			</div>
			 
				<button type="submit" id="submit" class="btn btn-primary">发布闲置</button>
		</form>
		<script type="text/javascript">
		var s1 = s2 = s3 = false;
			//商品名称
			var gname = $('#gname');
			//失去焦点
			gname.blur(function()
			{
				//判断长度
				var preg = /^[\W]{2,20}$/;
				//判断
				if(gname.val() && preg.test(gname.val())){
					$('#font1').text('  ' );
					s1 = true;
				}else{
					$('#font1').text('不能为空或格式不正确' );
					s1 = false;
				}
			});
			//商品价格
			var gpic = $('#gpic');
			//失去焦点
			gpic.blur(function()
			{
				//判断
				if(gpic.val()){
					$('#font2').text('  ' );
					s2 = true;
				}else{
					$('#font2').text('价格不能为空' );
					s2 = false;
				}
			});
			//缩略图
			var gsmallpic = $('#gsmallpic');
			//失去焦点
			gsmallpic.blur(function()
			{
				//判断
				if(gsmallpic.val()){
					$('#font3').text('  ' );
					s3 = true;
				}else{
					$('#font3').text('缩略图不能忘为空' );
					s3 = false;
				}
			});	
			// 判断
			$('#submit').submit(function()
				{
					if(s1 && s2 && s3){
						return true;
					}
					return false;
				});		
			//上传缩略图
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
		        //发送ajax验证
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
	</body>
	</html>
	
	
@endsection