@extends('home.layout.managefishpond')
@section('content')
    <div id="myTabContent" class="tab-content">


        <div class="tab-pane fade in active" id="question">
            <div class="container">
                <div class="col-md-12">
                    <div class="header-line">
                        <button class="btn btn-success" data-toggle="modal" data-target="#myModal">发布公告</button>
                    </div>
                    <div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div  class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="/fishpond/ask" method="post" id="askform">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <input name="title" id="title" style="background: transparent;border: none;font-size: 18px;color: #fff;" class="modal-title" id="myModalLabel" type="text" placeholder="请输入您的公告">
                                    </div>
                                    <div class="modal-body">
                                        {{csrf_field()}}
                                        <input type="hidden" name="yid" id="yid" value="{{$yt['yid']}}">
                                        <script id="aaabbb" name="content" type="text/plain"></script>
                                        <!-- 配置文件 -->
                                        <script type="text/javascript" src="/common/ueditor/ueditor.config.js"></script>
                                        <!-- 编辑器源码文件 -->
                                        <script type="text/javascript" src="/common/ueditor/ueditor.all.js"></script>
                                        <!-- 实例化编辑器 -->
                                        <script type="text/javascript">
                                            var ue = UE.getEditor('aaabbb');
                                        </script>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button id="tiwen" type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                                <script>
                                    $(function () {

                                        $('#tiwen').click(function () {
                                            $.ajax({
                                                url: "/myfishpond/addnotice",
                                                type:"post",
                                                data:{
                                                    yid:$('#yid').val(),
                                                    uid:$('#uid').val(),
                                                    _token:'{{csrf_token()}}',
                                                    content:ue.getContent(),
                                                    title:$('#title').val()
                                                },
                                                dataType:"json",
                                                success: function(msg){
                                                    if(msg ==1){
                                                        alert('提问完毕');
                                                        location.href=location.href;
                                                    }else {
                                                        alert('提交失败');
                                                        location.href=location.href;
                                                    }
                                                },
                                                error: function(errors) {
                                                    var json=JSON.parse(errors.responseText);
                                                    var str='';
                                                    for (var i in json){
                                                        str += json[i]+'  ';
                                                    }
                                                    alert(str);
                                                },
                                            });
                                        })
                                    })
                                </script>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="queslist  col-md-8 col-md-offset-2">
                        @if(!empty($ytnotic))
                            @foreach($ytnotic as $v)
                                <article class="media">
                                    <div class="media-body">
                                        <a class=" p-head" href="{{url('/myfishpond/ytnoticedit?nid=').$v['nid']}}">{{$v['title']}}</a>
                                        <div class="" style="display: inline-block;float: right;padding: 8px;"><a href="{{url('/myfishpond/ytnoticedit?nid=').$v['nid']}}">修改</a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="DelUser({{$v['nid']}})">删除</a></div>
                                        <hr>
                                    </div>
                                </article>
                            @endforeach
                        @endif
                            {!! $ytnotic->appends(['yid' => $yt['yid']])->render() !!}
                    </div>
                </div>
            </div>
        </div>
        <script>
            function DelUser(nid){
                //询问框
                layer.confirm('是否确认删除？', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    $.post("{{url('myfishpond/ytnoticdel')}}",{'_token':"{{csrf_token()}}",nid:nid},function(data){
                        if(data.status == 0){
                            layer.msg(data.msg, {icon: 6});
                            location.href = "{{url('myfishpond/manage?yid='.$yt['yid'])}}";
                        }else{
                            location.href = location.href;
                            layer.msg(data.msg, {icon: 5});
                        }
                    });
                }, function(){

                });

            }
        </script>
    </div>
@endsection