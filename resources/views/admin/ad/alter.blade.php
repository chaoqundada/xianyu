@extends('admin.layout.index')
@section('content')


    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="/mini/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/mini/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/mini/lang/zh-cn/zh-cn.js"></script>

   

<div>
    <form action="goalter" method="post" >
      {{ csrf_field()}}
    <input type="hidden" name="aid" value="{{ $aid }}">
    <input type="text" name="atitle" value="{{ $atitle }}" class="form-control">
   <br><br>
     <script id="editor" type="text/plain" style="height:400px;">{!! $acontent !!}</script><br>
    <input class="btn btn-primary btn-lg " type="submit" value=">>>　　　　修改内容　　　　<<<">
    </form> 
    

</div>



<script type="text/javascript">

    var ue = UE.getEditor('editor');
</script>

@endsection
