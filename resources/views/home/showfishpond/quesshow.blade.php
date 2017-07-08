@extends('home.layout.showfishpond')
@section('content')
    <div class="queslist  col-md-8 col-md-offset-2">
        <article class="media">
            <div class="media-body">
                <h2 class=" p-head">{{$ques['title']}}</h2>
                <br>
                {{$ques['content']}}
            </div>
        </article>
        <div style="display: none;">
            @if(!empty($ques))
                @foreach($ques as $v)
                    <article class="media">
                        <div class="media-body">
                            <a class=" p-head" href="{{url('/fishpond/quesshow?qid=').$v['qid']}}">{{$v['title']}}</a>
                            <br>
                            {{$v['content']}}
                            <div class="label label-warning pull-right r-activity" style="display: inline-block;float: right;padding: 8px;">回答TA</div>
                        </div>
                    </article>
                @endforeach
            @endif
        </div>
        <div style="width: 1000px auto;">
            <form action="/admin/article/insert" method="post">
                <script id="xxxooo" name="content" type="text/plain">sfdsafsadf </script>
                {{ csrf_field() }}
                <input type="submit" value="提交">
            </form>

            <!-- 配置文件 -->
            <script type="text/javascript" src="/common/ueditor/ueditor.config.js"></script>
            <!-- 编辑器源码文件 -->
            <script type="text/javascript" src="/common/ueditor/ueditor.all.js"></script>
            <!-- 实例化编辑器 -->
            <script type="text/javascript">
                var ue = UE.getEditor('xxxooo');
            </script>
        </div>

    </div>

@endsection