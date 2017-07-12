@extends('home.layout.managefishpond')
@section('content')
    <div class="queslist  col-md-8 col-md-offset-2" >
        <article class="media">
            <div class="media-body" style="margin-bottom: 40px">
                <h2 class=" p-head"><input type="text" id="title" name="title" value="{{$ytnotic['title']}}"></h2>
                <br>
            </div>
        </article>

        <div style="width: 1000px auto;">
            <div id="rewho" style="display: none"></div>
            <script id="xxxooo" name="content" type="text/plain">{!! $ytnotic['content'] !!}</script>
            <br>
            {{ csrf_field() }}
            <input type="hidden" id="nid" name="nid" value="{{$ytnotic['nid']}}">
            <input class="btn btn-success" id="wendatijiao" type="submit" value="提交">

            <!-- 配置文件 -->
            <script type="text/javascript" src="/common/ueditor/ueditor.config.js"></script>
            <!-- 编辑器源码文件 -->
            <script type="text/javascript" src="/common/ueditor/ueditor.all.js"></script>
            <!-- 实例化编辑器 -->
            <script type="text/javascript">
                var ue = UE.getEditor('xxxooo');
            </script>

            <script>
                $(function () {
                    $('#wendatijiao').click(function () {
                        if(ue.getContent() == ""){
                            alert('请输入内容');
                            return false;
                        }
                        $.post("{{url('/myfishpond/doytnoticedit')}}",{_token:'{{csrf_token()}}',content:ue.getContent(),nid:$('#nid').val(),title:$('#title').val()},function (msg) {
                            if(msg ==1){
                                alert('请先登录');
                                location.href='{{url("login/login")}}';
                            }else if(msg ==2){
                                alert('提交成功');
                                location.href=location.href;
                            }
                        })

                    })




                })
            </script>
        </div>

    </div>

@endsection