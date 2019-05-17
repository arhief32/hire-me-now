<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('plugins/images/favicon.png')}}">
    <title>Makaryo | {{$title}}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{url('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- Animation CSS -->
    <link href="{{url('css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (blue.css) for this starter
          page. However, you can choose any other skin from folder css / colors .
-->
    <link href="{{url('css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
   <!-- jQuery -->
   <script src="{{url('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script> 
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
            <div class="top-left-part"><a class="logo" href="{{url('home')}}"><b><img src="{{url('plugins/images/pixeladmin-logo.png')}}" alt="home" /></b><span class="hidden-xs"><img src="{{url('img/logo159x60v1.png')}}" alt="home" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" data-toggle="modal" data-target="#myModal"> <img src="{{url('plugins/images/users/varun.jpg')}}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b> </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li style="padding: 10px 0 0;">
                        <a href="{{url('home')}}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> {{$title}} </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li class="active"> {{$title}} </li>
                            <!-- <li><a href="#">Dashboard</a></li> -->
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            @yield('content')    
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2019 &copy; Makaryo </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>

<!-- modal profile -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User</h4>
      </div>
      <div class="modal-body">
        <div class="white-box">
            <div class="user-bg"> <img width="100%" alt="user" src="{{url('plugins/images/large/img1.jpg')}}">
                <div class="overlay-box">
                    <div class="user-content">
                        <a href="javascript:void(0)"><img src="{{url('plugins/images/users/genu.jpg')}}" class="thumb-lg img-circle" alt="img"></a>
                        <h4 class="text-white">{{ Auth::user()->name }}</h4>
                        <h5 class="text-white">{{ Auth::user()->email }}</h5> </div>
                </div>
            </div>
            <div class="user-btm-box">
                <div class="col-md-6 col-sm-6 text-center">
                    <p class="text-purple"><i class="ti-facebook"></i>Freelancer</p>
                    <h1>258</h1> </div>
                <div class="col-md-6 col-sm-6 text-center">
                    <p class="text-blue"><i class="ti-twitter"></i>Employer</p>
                    <h1>125</h1> </div>
            </div>

            <div class="user-btm-box">
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <a href="#" class="btn btn-custom btn-info btn-lg" target="_blank">Profile</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <a href="#" class="btn btn-custom btn-outline-info btn-lg" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-custom btn-info btn-lg" data-dismiss="modal">Close</a>
      </div>
    </div>

  </div>
</div>

    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{url('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{url('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{url('js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{url('js/waves.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{url('js/custom.min.js')}}"></script>
</body>

</html>
