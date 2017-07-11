@extends('home.layout.fishpondcom')

@section('content')
    <script language="javascript" src="/homes/js/PCASClass.js"></script>


            <div class="main-wrap">

                <div class="user-info">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">鱼塘修改</strong> / <small>Edit for&nbsp;Fishpond</small></div>
                    </div>
                    <hr/>

                    <!--头像 -->
                    <div class="user-infoPic">

                        <div class="filePic">
                            <input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
                            <img class="am-circle am-img-thumbnail" src="/homes/images/getAvatar.do.jpg" alt="" />
                        </div>

                        <p class="am-form-help">头像</p>

                        <div class="info-m">
                            <div><b>用户名：<i>{{session('user')['uname']}}</i></b></div>
                        </div>
                    </div>

                    <!--个人信息 -->
                    <div class="info-main">
                        <div id="oooxxx" style="cursor: pointer">
                            @if(session('error'))
                                {{session('error')}}
                                <br>
                                点击后消失哦
                            @endif
                        </div>
                        <script>
                            $('#oooxxx').click(function () {
                                $(this).hide(2000);
                            })
                        </script>

                        <form id="art_form" class="am-form am-form-horizontal" action="/myfishpond/doedit?yid={{$data['yid']}}" method="POST" enctype="multipart/form-data">

                            <div class="am-form-group">
                                <label for="yname" class="am-form-label">鱼塘名称</label>
                                <div class="am-form-content">
                                    <input type="text" value="{{$data['yname']}}" name="yname" id="yname" placeholder="鱼塘名称" style="width:599px">
                                    <input type="hidden" value="{{$data['yid']}}" name="yid" >
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="" class="am-form-label">鱼塘简介</label>
                                <div class="am-form-content">
                                    <input type="text" value="{{$data['description']}}" name="description"  placeholder="鱼塘简介" style="width:599px">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-form-label">地域</label>
                                <div class="am-form-content">
                                    <select name="sheng" style="width:288px;float:left;margin-right: 20px;"></select>
                                    <select name="shi" style="width:288px"></select><br>
                                    <script>
                                        new PCAS("sheng","shi","{{$data['sheng']}}","{{$data['shi']}}");
                                    </script>
                                </div>
                            </div>

                            <div class="">
                                <label for="ytpic" class="am-form-label">鱼塘封面</label>
                                <div class="am-form-content">
                                    <input readonly value="{{$data['ytpic']}}" type="text" name="ytpic" id="fishpond_thumb" style="float: left;width:599px;margin-top: -5px;margin-right: 8px;">
                                    <input type="file" name="file_upload" id="file_upload">
                                    <img src="/uploads/fishpond/{{$data['ytpic']}}" alt="" name="pic" id="pic" style="width:555px;" >
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
                                                url: "/myfishpond/upload",
                                                data: formData,
                                                async: true,
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                success: function(data) {
                                                    $('#pic').attr('src','/uploads/fishpond/'+data);
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
                            </div>



                            <div class="info-btn">
                                {{csrf_field()}}
                                <input class="am-btn am-btn-danger" type="submit" value="修改鱼塘">
                            </div>

                        </form>
                    </div>

                </div>

            </div>





@endsection
