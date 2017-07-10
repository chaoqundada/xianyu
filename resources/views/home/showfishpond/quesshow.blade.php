@extends('home.layout.showfishpond')
@section('content')
    <div class="queslist  col-md-8 col-md-offset-2" >
        <article class="media">
            <div class="media-body" style="margin-bottom: 40px">
                <h2 class=" p-head">{{$ques['title']}}</h2>
                <br>
                {{$ques['content']}}
            </div>
        </article>
        <div style="margin-bottom: 20px">
            @if(!empty($quesspone))
                @foreach($quesspone as $k=>$v)
                    <article class="media">
                        <div class="media-body">
                            <br>
                            楼层{{$v['spid']}}&nbsp;&nbsp;&nbsp;&nbsp;回答者 <span class=" p-head uname">{{$users[$k][0]['uname']}}</span>
                            <br>
                            <br>
                            @if($v['tospid'])
                                <div id="towho" style="color: #0000C2">回复楼层{{$v['tospid']}}<br>
                                        {{substr(strip_tags(\App\Http\Model\Quesspone::where('spid',$v['tospid'])->first()['content']),0,30)}}...
                                </div>
                            @endif
                            <div id="qcontent">{!! $v['content'] !!}</div>
                            <br>
                            {{date('Y-m-d H:i:s',$v['ftime'])}}
                            <div class="label label-warning pull-right r-activity replyuser" xxoo="{{$v['spid']}}"  style="display: inline-block;float: right;padding: 8px;cursor: pointer">回复TA</div>
                            <hr style="border: 3px solid red">
                        </div>
                    </article>
                @endforeach
            @endif
        </div>

        <div style="width: 1000px auto;">
            <div id="rewho" style="display: none"></div>
            <script id="xxxooo" name="content" type="text/plain"></script>
            <br>
            {{ csrf_field() }}
            <input type="hidden" id="tospid" name="tospid" value="0">
            <input type="hidden" id="qid" name="qid" value="{{$ques['qid']}}">
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
                        $.post("{{url('/fishpond/quesreply')}}",{_token:'{{csrf_token()}}',content:ue.getContent(),tospid:$('#tospid').val(),qid:$('#qid').val()},function (msg) {
                            if(msg ==1){
                                alert('请先登录');
                                location.href='{{url("login/login")}}';
                            }else if(msg ==2){
                                alert('提交成功');
                                location.href=location.href;
                            }
                        })

                    })


                    $('.replyuser').click(function () {
                        $('#tospid').val($(this).attr('xxoo'));
                        var who = '@'+$(this).siblings('.uname').html()+': ';
                        var cont=$(this).siblings('#qcontent').text().slice(0,9)+'...';
                        //ue.setContent(who+cont);
                        $('#rewho').html(who+cont);
                        $('#rewho').show();
                    })



                })
            </script>
        </div>

    </div>

@endsection