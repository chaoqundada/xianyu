@extends('home.layout.showfishpond')
@section('content')
    <div id="myTabContent" class="tab-content">

        <div class="tab-pane fade in active" id="goodslist">
            <div class="container">
                <div class="col-md-12">
                    <div class="header-line">
                        <button class="btn btn-success" id="signin" >签到</button>
                    </div>
                </div>
                <script>
                    $(function () {
                        $('#signin').click(function () {
                            $.get("{{url('/fishpond/signin')}}",{yid:'{{$yt['yid']}}',uid:'{{session('user')['uid']}}'},function (msg) {
                                if(msg == 1){
                                    alert('签到成功');
                                }else if(msg == 2){
                                    alert('您已经签到')
                                }else{
                                    alert('请先登录')
                                }
                            })
                        })
                    })
                </script>
                @if($goods)
                    <table class="table">
                        <tbody>
                        @foreach($goods as $k=>$v)
                            <tr >
                                <td>
                                    <a href="{{url('goods/details/'.$v['gid'])}}">
                                        <img style="width: 70px; height: 70px;" src="{{url($v['gsmallpic'])}}" alt="{{$v['gname']}}" class="img-circle">&nbsp;&nbsp;&nbsp;&nbsp;{{$v['gname']}}
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {!! $goods->appends(['yid' => $yt['yid']])->render() !!}
                @endif
            </div>
        </div>

    </div>
@endsection