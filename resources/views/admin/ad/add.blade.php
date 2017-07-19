@extends('admin.layout.index')
@section('content')


    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="/mini/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/mini/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/mini/lang/zh-cn/zh-cn.js"></script>


  @if(count($errors) > 0)
      

  @foreach ($errors->all() as $error)
          <span>{{ $error }}</span>
      @endforeach
</div>
    @endif 
 
    
     @if(session('success'))
    <div class="alert alert-success" role="alert">{{session('success')}}</div>
     @endif   
   

<div>
    <form action="adds" method="post" >
      {{ csrf_field()}}
    
    <input type="text" name="atitle" value="" class="form-control">
   <br><br>
     <script id="editor" type="text/plain" style="height:400px;"></script><br>
    <input class="btn btn-primary btn-lg " type="submit" value=">>>　　　　添加内容　　　　<<<">
    </form> 
    

</div>



<script type="text/javascript">

    var ue = UE.getEditor('editor');
</script>

@endsection
