@extends('home.layout.showfishpond')
@section('content')
    <div id="myTabContent" class="tab-content">


        <div class="tab-pane fade in active" id="question">
            <div class="container">
                <div class="col-md-12">
                    <div class="header-line">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">我要提问</button>
                        <button class="btn btn-success" id="signin" >签到</button>
                    </div>
                    <div  class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div  class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="/fishpond/ask" method="post" id="askform">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <input name="title" id="title" style="background: transparent;border: none;font-size: 18px;color: #fff;" class="modal-title" id="myModalLabel" type="text" placeholder="请输入您的问题">
                                    </div>
                                    <div class="modal-body">
                                        {{csrf_field()}}
                                        <input type="hidden" name="yid" id="yid" value="{{$yt['yid']}}">
                                        <input type="hidden" name="uid" id="uid" value="{{session('user')['uid']}}">
                                        <input name="content" id="content" style="background: transparent;border: none;" type="text" placeholder="请输入问题描述">
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
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                },
                                                url: "/fishpond/ask",
                                                type:"post",
                                                data:{
                                                    yid:$('#yid').val(),
                                                    uid:$('#uid').val(),
                                                    content:$('#content').val(),
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

                                        $('#signin').click(function () {
                                            $.get("{{url('/fishpond/signin')}}",{yid:'{{$yt['yid']}}',uid:'{{session('user')['uid']}}'},function (msg) {
                                                if(msg == 1){
                                                    alert('签到成功');
                                                }else if(msg == 2){
                                                    alert('您已经签到')
                                                }else{
                                                    alert('请先登录')
                                                }
                                            })
                                        })
                                    })
                                </script>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="queslist  col-md-8 col-md-offset-2">
                        @if(!empty($ques))
                            @foreach($ques as $v)
                                <article class="media">
                                    <div class="media-body">
                                        <a class=" p-head" href="{{url('/fishpond/quesshow?qid=').$v['qid']}}">{{$v['title']}}</a>
                                        <br>
                                        {{$v['content']}}
                                        <div class="label label-warning pull-right r-activity" style="display: inline-block;float: right;padding: 8px;">回答数</div>
                                    </div>
                                </article>
                            @endforeach
                        @endif
                            {!! $ques->appends(['yid' => $yt['yid']])->render() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection