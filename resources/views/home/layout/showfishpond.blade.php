<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/admins/img/favicon.html">

    <title>{{$yt->yname}}</title>
    <link href="/admins/css/fishpond.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="/admins/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admins/css/bootstrap-reset.css" rel="stylesheet">
    <script src="/admins/js/jquery-1.8.3.min.js"></script>
    <script src="/admins/js/bootstrap.min.js"></script>
    <style>
        #myTab{text-align: center;}
        #myTab a{font-size: 100px;margin: 20px;color:#333;border: 8px solid #333;padding: 23px 27px 35px 35px;border-radius: 50%;}
        #myTab a:hover,#myTab a:focus{text-decoration:none}
        #noticelist{
            list-style: none;
            margin:0 auto;
            padding:0;
            width: 300px;
        }
        #noticelist{
            height:72px;
            overflow: hidden;
        }
        #noticelist li{
            width:300px;
            height:72px;
            overflow: hidden;
            line-height: 72px;
        }
    </style>
</head>

<body>

<section id="container" class="">
    <!--main content start-->
    <!-- page start-->
    <div class="row" style="margin:0px">
        <div class="col-lg-12" style="padding:0px">
            <section class="panel">
                <div id="home-sec" style="background: url({{url('uploads/fishpond/'.$yt->ytpic)}}) no-repeat center center;">
                    <div class="overlay">
                        <div class="container">
                            <div class="row text-center">
                                <div class="col-md-8 col-md-offset-2">
                                    <h1>{{$yt->yname}}</h1>
                                    <p>
                                        {{$yt->description}}
                                    </p>
                                    <hr>
                                    <hr>
                                    <div class="just-pad"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>

    <ul id="myTab" class="nav nav-tabs">
        <a style="padding-left: 24px;padding-right: 30px;" class="active glyphicon glyphicon-home" href="/"></a>
        <a class="glyphicon glyphicon-align-left" href="{{url('/fishpond/index?yid=').$yt['yid']}}"></a>
        <a class="glyphicon glyphicon-edit" href="{{url('/fishpond/queslist?yid=').$yt['yid']}}"></a>
    </ul>
    <div class="header-line">
        <script type="text/javascript">
            $(function(){
                $('#noticelist li:lt(3)').clone().appendTo($('#noticelist'))
                var i=0;
                setInterval(function(){
                    i++;
                    $('ul').scrollTop(i*4)
                    if(i>=18*{{count($ytnotic)}}){
                        i=1;
                    }
                },200)
            })

        </script>
        <ul id="noticelist">
            @if($ytnotic)
                @foreach($ytnotic as $k=>$v)
                    <li>
                        <span><a href="{{url('/fishpond/ytnoticshow?nid='.$v['nid'])}}">{{$v['title']}}</a></span><br>
                        <p style="clear:both"></p>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    @section('content')
    @show
    <!-- page end-->
</section>
<!--main content end-->

</body>
</html>
