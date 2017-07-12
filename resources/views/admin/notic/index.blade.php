@extends('admin.layout.index')
@section('content')
  @if (session('error'))
        <div class="alert alert-block alert-danger fade in" id="error">
        
            <font size="5"><i class="icon-remove-sign"></i>{{session('error')}}</font>
           
        </div>
    @endif




<aside class="lg-side">
  <div class="inbox-head">
      <h3>邮件</h3>
      <form class="pull-right position" action="{{url('/admin/notic/index')}}" method='get'>
		{{ csrf_field() }}
          <div class="input-append">
              <input type="text" placeholder="关键词" name='search' class="sr-input">
              <button type="submit" class="btn sr-btn"><i class="icon-search"></i></button>
          </div>
      </form>
  </div>
  <div class="inbox-body">
     <div class="mail-option">
         <div class="chk-all">
             
             <div class="btn-group">
                 <a class="btn mini all" href="#" data-toggle="dropdown">
                  全部
                     <i class="icon-angle-down "></i>
                 </a>
                 <ul class="dropdown-menu">
                     <li id="offread"><a href="javascript:;">未读</a></li>
                     <li id="onread"><a href="javascript:;">已读</a></li>
                 </ul>
             </div>
         </div>

		<div class="pagination" style="margin:0px;float:right;padding:0px">
  			{!! $notics->appends($search)->render() !!}
  		</div>

         <div class="btn-group">
             <a class="btn mini tooltips" href="{{url('/admin/notic/index')}}">
                 <i class=" icon-refresh"></i>
             </a>
         </div>
         <div class="btn-group hidden-phone">

             <a class="btn mini blue" href="javascript:;" id="del">
                 删除
             </a>
         </div>
     
     </div>
      <table class="table table-inbox table-hover">
        <tbody>
	@if(!empty($notics))
		@foreach($notics as $k => $v)
		
          <tr class="" >
              <td class="inbox-small-cells">
                    <input type="checkbox" class="mail-checkbox" anid="{{$v['anid']}}">  
              </td>
              <td class="inbox-small-cells desc" value='{{$v['anid']}}'>
              @if($v['astatic']==1)
              	
              		<i class="icon-star inbox-started" title="未读"></i>
		        @else
              		<i class="icon-star" title="已读"></i>
		        

		        @endif
              </td>
              <td class="view-message dont-show desc" value='{{$v['anid']}}'>{{$v['uname']}}
               <span class="label label-danger pull-right">{{$v['content']}}</span>
              </td>
              <td class="view-message desc" value='{{$v['anid']}}'>{{$v['gname']}}</td>
              <td class="view-message inbox-small-cells desc" value='{{$v['anid']}}'></td>
              <td class="view-message text-right desc" value='{{$v['anid']}}'>{{date('Y-m-d H:i:s',$v['jtime'])}}</td>
          </tr>
      
		@endforeach
    @endif
      </tbody>
      </table>

  </div>
</aside>

<script type="text/javascript">
	$('.desc').click(function(){
	
		location.href="{{url('admin/notic/show')}}/"+$(this).attr('value');
	});

	$('#onread').click(function(){
		location.href="{{url('/admin/notic/index?a=')}}"+2;
	});
	$('#offread').click(function(){
		location.href="{{url('/admin/notic/index?a=')}}"+1;
	});



	$('#del').click(function(){
    if($('.mail-checkbox:checked').length==0)
    {
      return false;
    }
		confirm('确认删除邮件?');
		var arr=[];
		if($('.mail-checkbox').has('checked'))
		{
			$('.mail-checkbox:checked').each(function(){
				arr.push($(this).attr('anid'));
			});
		}
		
		$.post("{{url('/admin/notic/del')}}",{"_token":"{{csrf_token()}}","brr":arr},function(msg){
			if(msg)
			{
				location.href=location.href;
			}
		});
		
	});


  if($('#error')) {
        setTimeout(function () {
            $('#error').slideUp(1000);
        }, 2000);
    }


</script>


@endsection