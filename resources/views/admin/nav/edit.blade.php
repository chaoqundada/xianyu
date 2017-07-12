@extends('admin.layout.index') 

@section('content')
	<div class="col-lg-12">
  <section class="panel">
    <header class="panel-heading">导航修改</header>
    <div class="panel-body">
      <div class=" form">
        <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="/admin/nav/update" novalidate="novalidate">
        	{{ csrf_field() }} 
          <div class="form-group ">
            <label for="curl" class="control-label col-lg-2">导航序号(navigation ID)</label>
            <div class="col-lg-10">
              <input class="form-control valid" type="text" name="nid" value="{{$edit['nid']}}" readonly></div>
          </div>			
          <div class="form-group ">
            <label for="curl" class="control-label col-lg-2">导航标题(navigation title)</label>
            <div class="col-lg-10">
              <input class="form-control valid" type="text" name="ntitle" value="{{$edit['ntitle']}}"></div>
          </div>
          <div class="form-group ">
            <label for="curl" class="control-label col-lg-2">导航地址 (navigation address)</label>
            <div class="col-lg-10">
              <input class="form-control valid" type="text" name="nlink" value="{{$edit['nlink']}}"></div>
          </div>
           
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
            
              <button class="btn btn-danger" type="submit">提交</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </section>
</div>


@endsection
