@extends('admin.layout.index') 

@section('content')
	@if (count($errors) > 0)
	    <div class="alert alert-block alert-danger fade in" id="error">
	    	<font size="5px">添加失败</font>
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul> 
	    </div> 
	@endif

  <div class="col-lg-12">
  <section class="panel">
    <header class="panel-heading">添加导航</header>
    <div class="panel-body">
      <div class=" form">
        <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="/admin/nav/insert" novalidate="novalidate">
          <div class="form-group ">
            <label for="curl" class="control-label col-lg-2">导航标题(navigation title)</label>

            <div class="col-lg-10"  style="width:500px; ">
              <input class="form-control valid"  type="text" name="ntitle" value="{{ old('ntitle') }}">
            </div>
          </div>	
          
          <div class="form-group ">
            <label for="curl" class="control-label col-lg-2">导航地址 (navigation address)</label>
            <div class="col-lg-10" style="width:500px;">
              <input class="form-control valid"  type="text" name="nlink" value="{{ old('nlink') }}">
            </div>
          </div>
         	{{ csrf_field() }}
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button class="btn btn-danger" type="submit">提交</button>
            </div>
        </form>
      </div>
    </div>
  </section>
</div>

<script>

	 if($('#error')) {
        setTimeout(function () {
            $('#error').slideUp(1000);
        }, 3000);
    }

</script>



@endsection