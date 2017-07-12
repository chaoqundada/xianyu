@extends('admin.layout.index')

@section('content')
    <div class="row">
        <form class="form-inline" role="form" method="get" action="{{url('admin/fishpond/index')}}">
        <div class="col-sm-6">
            <div id="sample_1_length" class="dataTables_length">
                <label>
                    <select id="count" size="1" name="count" aria-controls="sample_1" class="form-control">
                        <option value="2"   @if($count == 2) selected @endif>2</option>
                        <option value="5"   @if($count == 5) selected @endif>5</option>
                        <option value="10"  @if($count == 10) selected @endif>10</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="dataTables_filter" id="sample_1_filter">
                    <div class="form-group">
                        <label class="sr-only" for="keywords"></label>
                        <input name="keywords" value="{{$keywords or ""}}" type="text" class="form-control" id="keywords" placeholder="请输入鱼塘名称">
                    </div>
                    <button type="submit" class="btn btn-success">搜索</button>

            </div>
        </div>
        </form>
    </div>
    <div  class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Advanced Table
                </header>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th><i class=" icon-circle text-success"></i> ID</th>
                        <th class="hidden-phone"><i class=" icon-circle text-success"></i> 鱼塘名称</th>
                        <th><i class=" icon-circle text-success"></i> 鱼塘等级</th>
                        <th><i class="  icon-circle text-success"></i> 鱼塘封面</th>
                        <th><i class="  icon-circle text-success"></i> 用户数</th>
                        <th><i class="  icon-circle text-success"></i> 鱼塘所在地</th>
                        <th><i class="  icon-circle text-success"></i> 鱼塘状态</th>
                        <th><i class=" icon-edit"></i> 操作</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($yts as $v)
                    <tr>
                        <td><a href="#">{{$v['yid']}}</a></td>
                        <td class="hidden-phone">{{$v['yname']}}</td>
                        <td>{{$v['yrank']}}</td>
                        <td><img height="88px;" src="{{url('/uploads/fishpond/'.$v['ytpic'])}}" alt=""></td>
                        <td>{{$v['yatt']}}</td>
                        <td>{{$v['sheng']}} {{$v['shi']}}</td>
                        <td><span class="label label-success label-mini">{{$status[$v['ystatic']]}}</span></td>
                        <td>
                            <button class="btn btn-success btn-xs shenhe" value="{{$v['yid']}}"><i class="icon-ok"></i></button>
                            <button class="btn btn-danger btn-xs fengsha" value="{{$v['yid']}}"><i class="icon-trash "></i></button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    {!! $yts->appends(['keywords' => $keywords,'count'=>$count])->render() !!}
    <script>
        $(function () {
            $('#count').change(function () {
                location.href='/admin/fishpond/index?count='+$(this).find('option:selected').val()+'&keywords='+$('#keywords').val();
            })

            //审核鱼塘
            $('.shenhe').click(function () {
                $.get('{{url('admin/fishpond/check')}}',{keywords:'{{$keywords}}',count:'{{$count}}',page:'{{$yts->currentPage()}}',yid:$(this).val()},function (msg) {
                    location.href=msg;
                })
            })

            //封杀鱼塘
            $('.fengsha').click(function () {
                $.get('{{url('admin/fishpond/forceout')}}',{keywords:'{{$keywords}}',count:'{{$count}}',page:'{{$yts->currentPage()}}',yid:$(this).val()},function (msg) {
                    location.href=msg;
                })
            })


        });

    </script>


@endsection