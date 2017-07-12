
@extends('admin.layout.index')
@section('content')

        
</form>
  
  <div class="row">
                   



                      @if(session('success'))
    <div class="alert alert-success" role="alert">{{session('success')}}</div>
     @endif 
    				  
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">                           
<form class="form-horizontal" method="post" action="/admin/links/doalter">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">站点名</label>
    <div class="col-sm-10">
     
      <input type="text" name="lname" class="form-control" id="inputEmail3" value="{{$lname}}">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">站点链接</label>
    <div class="col-sm-10">
     {{ csrf_field()}}
      <input type="hidden" name="lid" value="{{ $lid }}"> 
      <input type="text" name="lurl" class="form-control" id="inputPassword3" value="{{$lurl}}">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
     
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">修改信息</button>
    </div>
  </div>
  </div>
  	</section>
  	</div>
</form>
@endsection