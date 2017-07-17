@extends('admin.layout.index')

@section('content')
    <div  class="row">
        <div class="col-lg-12">
            <form action="" class="form-inline">
                <select class="form-control" id="ytorder" name="ytorder" style="width:18%">
                    <option value="1">按照新鲜度</option>
                    <option value="2">按照热度</option>
                </select>&nbsp;&nbsp;&nbsp;
                <button id="ytrecommend" class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
    <script>
        $(function () {
            $('#ytrecommend').click(function () {
                $.get("{{url('/admin/fishpond/dorecommend')}}",{ytorder:$('#ytorder').val()},function (msg) {
                    console.log(msg);
                })
                return false;
            });
        })
    </script>

@endsection