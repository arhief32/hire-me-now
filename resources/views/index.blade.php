<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="https://wrappixel.com/demos/free-admin-templates/all-lite-landing-pages/assets/images/logos/pixel-favicon.png">
    <title>Makaryo - Job Portal Online</title>
    <!-- Custom CSS -->
    <link href="{{url('css/welcome_style.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<!-- ============================================================== -->
<!-- Main wrapper -->
<!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Header part -->
        <!-- ============================================================== -->
        <header class="py-3 bg-white">
            <div class="container">
                <!-- Start Header -->
                <div class="header">
                    <nav class="navbar navbar-expand-md navbar-light px-0">
                        <a class="navbar-brand" href="#">
                            <img src="{{ url('img/logo.jpeg') }}" height="80" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                            @if (Route::has('login'))
                                @auth
                                <li class="nav-item pr-3">
                                    <a href="{{ url('/home') }}" class="btn btn-custom btn-outline-info btn-lg">Dashboard</a>
                                </li>
                                @else
                                    <li class="nav-item pr-3">
                                        <a href="{{ route('login') }}" class="btn btn-custom btn-info btn-lg">Login</a>
                                    </li>
                                    @if (Route::has('register'))
                                    <li class="nav-item pr-3">
                                        <a href="{{ route('register') }}" class="btn btn-custom btn-outline-info btn-lg">Register</a>
                                    </li>
                                    @endif
                                @endauth
                            @endif
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- End Header -->
            </div>
        </header>
        <!-- ============================================================== -->
        <!-- Header part -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- Page wrapper part -->
        <!-- ============================================================== -->
        <div class="content-wrapper">
            <!-- ============================================================== -->
            <!-- Demos part -->
            <!-- ============================================================== -->
            <section class="spacer bg-light">
                <div class="container">
                    <div class="row justify-content-md-center pt-5">
                        <div class="col-md-9 text-center">
                            <h2 class="text-dark">Dapatkan kemudahan pencarian kerja dan perncarian freelancer di <span class="font-weight-bold">Makaryo</span></h2>
                        </div>
                    </div>
                    <div class="row py-5">
                        <!-- ============================================================== -->
                        <!-- Freelancer -->
                        <!-- ============================================================== -->
                        <div class="col-md-6">
                            <div class="card p-2 mr-1">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h2 class="text-dark font-weight-medium">Freelancer</h2>
                                        <h4 class="text-success">Free Forever</h4>
                                    </div>
                                    <div class="live-box text-center mt-4">
                                        <img class="img-fluid" src="{{ url('img/freelancer.png') }}">
                                    </div>
                                    <div class="text-center mt-4 mb-3">
                                        <a href="#" class="btn btn-custom btn-outline-info btn-lg" target="_blank">Register now as freelancer!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- Employer -->
                        <!-- ============================================================== -->
                        <div class="col-md-6">
                            <div class="card p-2 mr-1">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h2 class="text-dark font-weight-medium">Employer</h2>
                                        <h4 class="text-success">Free Forever</h4>
                                    </div>
                                    <div class="live-box text-center mt-4">
                                        <img class="img-fluid" src="{{ url('img/employer.png') }}">
                                    </div>
                                    <div class="text-center mt-4 mb-3">
                                        <a href="#" class="btn btn-custom btn-outline-info btn-lg" target="_blank">Register now as employer!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- ============================================================== -->
        <!-- End page wrapperHeader part -->
        <!-- ============================================================== -->
        <footer class="text-center p-4"> All Rights Reserved <a href="#">Makaryo</a>.</footer>
    </div>
</body>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="https://wrappixel.com/demos/free-admin-templates/all-lite-landing-pages/assets/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="https://wrappixel.com/demos/free-admin-templates/all-lite-landing-pages/assets/plugins/popper.js/dist/umd/popper.min.js"></script>
<script src="https://wrappixel.com/demos/free-admin-templates/all-lite-landing-pages/assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

</html>