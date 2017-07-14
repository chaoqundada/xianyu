<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, admins, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{asset('/admins/img/favicon.html')}}">
      <script src="{{asset('/admins/js/jquery-1.8.3.min.js')}}" ></script>
    <title>{{ Config::get('app.title') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/admins/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admins/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('/admins/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('/admins/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{asset('/admins/css/owl.carousel.css')}}" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{asset('/admins/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/admins/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="/admins/js/html5shiv.js"></script>
      <script src="/admins/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="#" class="logo"><span>管理列表</span></a>

            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                   
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                    
                        <a class="dropdown-toggle" href="{{url('/admin/notic/index')}}" title="后台邮件">
                          <i class="icon-envelope-alt"></i>
                          @if(session('admin_notic')>0)
                            <span class="badge bg-important">{{session('admin_notic')}}
                            </span>
                          @endif
                        </a>
              

                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-alt"></i>
                            <span class="badge bg-warning">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">You have 7 new notifications</p>
                            </li>
                            <li>
                                <a href="/admins/#">
                                    <span class="label label-danger"><i class="icon-bolt"></i></span>
                                    Server #3 overloaded.
                                    <span class="small italic">34 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admins/#">
                                    <span class="label label-warning"><i class="icon-bell"></i></span>
                                    Server #10 not respoding.
                                    <span class="small italic">1 Hours</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admins/#">
                                    <span class="label label-danger"><i class="icon-bolt"></i></span>
                                    Database overloaded 24%.
                                    <span class="small italic">4 hrs</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admins/#">
                                    <span class="label label-success"><i class="icon-plus"></i></span>
                                    New user registered.
                                    <span class="small italic">Just now</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admins/#">
                                    <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                    Application error.
                                    <span class="small italic">10 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admins/#">See all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        @if(session('admin_user'))
                        <a data-toggle="dropdown" class="dropdown-toggle" href="/admins/#">
                            <img alt="" src="/admins/img/avatar1_small.jpg">

                            <span class="username">欢迎!{{session('admin_user')['uname']}}</span>

                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li style="width:100%;background-color:#333;">
                                <a href="{{url('/admin/user/changeupwd')}}"><i class="icon-cog"></i>修改密码</a>
                            </li>
                            <li>
                                <a onclick="return !confirm('帅哥,再逛一会嘛!')" href="{{url('admin/user/outlogin')}}"><i class="icon-key"></i>退出登录</a>
                            </li>
                        </ul>
                        @endif
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="{{url('admin/index/show')}}">

                          <i class="icon-dashboard"></i>
                          <span>主页面</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>后台户管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('admin/user/index')}}">后台用户列表</a></li>
                          <li><a class="xxxx" href="{{url('admin/user/add')}}">添加后台用户</a></li>

                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-cogs"></i>
                          <span>商品分类管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admin/tgoods/index">分类列表</a></li>
                          <li><a class="" href="/admin/tgoods/add">添加分类</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>商品管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admin/goods/index">商品列表</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>网站配置</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('/admin/config')}}">配置详情</a></li>
                          <li><a class="" href="{{url('/admin/config/report')}}">举报类别配置</a></li>
                          <li><a class="" href="{{url('/admin/config/show')}}">举报类别详情</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>友情链接</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('/admin/links')}}">友情链接列表</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>导航管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="">导航列表</a></li>
                          <li><a class="" href="">添加导航</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>轮播管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="">轮播列表</a></li>
                          <li><a class="" href="">添加轮播</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>鱼塘管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="xxxx" href="{{url('/admin/fishpond/index')}}">鱼塘列表</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>信息管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="">信息列表</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-cogs"></i>
                          <span>Components</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admins/grids.html">Grids</a></li>
                          <li><a class="" href="/admins/calendar.html">Calendar</a></li>
                          <li><a class="" href="/admins/charts.html">Charts</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>Form Stuff</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admins/form_component.html">Form Components</a></li>
                          <li><a class="" href="/admins/form_wizard.html">Form Wizard</a></li>
                          <li><a class="" href="/admins/form_validation.html">Form Validation</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-th"></i>
                          <span>Data Tables</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admins/basic_table.html">Basic Table</a></li>
                          <li><a class="" href="/admins/dynamic_table.html">Dynamic Table</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="/admins/inbox.html">
                          <i class="icon-envelope"></i>
                          <span>Mail </span>
                          <span class="label label-danger pull-right mail-info">2</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="/admins/javascript:;" class="">
                          <i class="icon-glass"></i>
                          <span>Extra</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/admins/blank.html">Blank Page</a></li>
                          <li><a class="" href="/admins/profile.html">Profile</a></li>
                          <li><a class="" href="/admins/invoice.html">Invoice</a></li>
                          <li><a class="" href="/admins/404.html">404 Error</a></li>
                          <li><a class="" href="/admins/500.html">500 Error</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="/admins/login.html">
                          <i class="icon-user"></i>
                          <span>Login Page</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
        <!-- 内容开始 -->
          <section class="wrapper">
            @section('content')

            @show

          </section>
          <!-- 内容结束 -->
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/admins/js/jquery.js"></script>

    <script src="/admins/js/bootstrap.min.js"></script>
    <script src="/admins/js/jquery.scrollTo.min.js"></script>
    <script src="/admins/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/admins/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="/admins/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/admins/js/owl.carousel.js" ></script>
    <script src="/admins/js/jquery.customSelect.min.js" ></script>

    <!--common script for all pages-->
    <script src="/admins/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="/admins/js/sparkline-chart.js"></script>
    <script src="/admins/js/easy-pie-chart.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

     $(function(){

         $('select.styled').customSelect();
      });


    $(function () {
        $('.sub-menu .sub a').each(function () {
            if($(this).attr('href') == location.href){
                $(this).parent().parent().parent().addClass('active');
            }
        })
    })


  </script>

  </body>
</html>
