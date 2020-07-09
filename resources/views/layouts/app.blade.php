<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
<!-- Mobile Specific Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Favicon-->
<link rel="shortcut icon" href="{{asset('/frontend')}}/img/fav.png">
<!-- Author Meta -->
<meta name="author" content="colorlib">
<!-- Meta Description -->
<meta name="description" content="">
<!-- Meta Keyword -->
<meta name="keywords" content="">
<!-- meta character set -->
<meta charset="UTF-8">
<!-- Site Title -->
<title>{{ config('app.name', 'HRM Bakoel Corp') }}</title>

<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/linearicons.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/nice-select.css">							
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/owl.carousel.css">			
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/jquery-ui.css">			
    <link rel="stylesheet" href="{{asset('/frontend')}}/css/main.css">
    
<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
</head>
<body>	
    <header id="header" id="home">
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="http://bakoel.co.id"><img src="{{asset('/frontend')}}/img/BakoelCor.png" alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <li><a href="mailto:hrd@bakoel.co.id"><span class="lnr lnr-envelope"></span> <span class="text">hrd@bakoel.co.id</span></a>	</li>
                        </ul>
                    </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
    </header><!-- #header -->
    @yield('content')
    <!-- start footer Area -->		
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 col-sm-6">
                    
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    
                </div>
            </div>
            <div class="footer-bottom row align-items-center justify-content-between">
                <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> <-([ Lahaula wala quwatta illa billahhil aliyil adzim ])-> <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="mailto:mikailshop@gmail.com" target="_blank"><b>Hamba Dhoif</b></a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>						
        </div>
    </footer>	
    <!-- End footer Area -->	


<script src="{{asset('/frontend')}}/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('/frontend')}}/js/vendor/bootstrap.min.js"></script>			
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{asset('/frontend')}}/js/easing.min.js"></script>			
<script src="{{asset('/frontend')}}/js/hoverIntent.js"></script>
<script src="{{asset('/frontend')}}/js/superfish.min.js"></script>	
<script src="{{asset('/frontend')}}/js/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('/frontend')}}/js/jquery.magnific-popup.min.js"></script>	
<script src="{{asset('/frontend')}}/js/jquery.tabs.min.js"></script>						
<script src="{{asset('/frontend')}}/js/jquery.nice-select.min.js"></script>	
<script src="{{asset('/frontend')}}/js/owl.carousel.min.js"></script>									
<script src="{{asset('/frontend')}}/js/mail-script.js"></script>	
<script src="{{asset('/frontend')}}/js/main.js"></script>	
</body>
</html>