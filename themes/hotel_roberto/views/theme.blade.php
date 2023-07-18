<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Roberto - Hotel &amp; Resort HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('themes/hotel_roberto')}}/img/core-img/favicon.png">

    <!-- Stylesheet -->

    <link rel="stylesheet" href="{{asset('themes/hotel_roberto')}}/assets/style-68b7bf4e.css">

    <link webesembly:head-links="true" />

</head>

<body>
<!-- Preloader -->
<!--<div id="preloader">
    <div class="loader"></div>
</div>-->
<!-- /Preloader -->

<!-- Header Area Start -->
<header class="header-area" webesembly:section="header">
    <!-- Search Form -->
    <div class="search-form d-flex align-items-center">
        <div class="container">
            <form action="index.html" method="get">
                <input type="search" name="search-form-input" id="searchFormInput" placeholder="Type your keyword ...">
                <button type="submit"><i class="icon_search"></i></button>
            </form>
        </div>
    </div>

    <!-- Top Header Area Start -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">

                <div class="col-6">
                    <div class="top-header-content">
                        <a href="#"><i class="icon_phone"></i> <span webesembly:editable="true">(123) 456-789-1230</span></a>
                        <a href="#"><i class="icon_mail"></i> <span webesembly:editable="true">info.colorlib@gmail.com</span></a>
                    </div>
                </div>

                <div class="col-6">
                    <div class="top-header-content">
                        <!-- Top Social Area -->
                        <div class="top-social-area ml-auto">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Top Header Area End -->

    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="robertoNav">

                    <div webesembly:module="logo" skin="header" name="header" />

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">

                            <div webesembly:module="menu" skin="header" name="header" />

                            <!-- Search -->
                            <div class="search-btn ml-4">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>

                            <!-- Book Now -->
                            <div class="book-now-btn ml-3 ml-lg-5">
                                <a href="#">Book Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->

@yield('content')

<!-- Footer Area Start -->
<footer class="footer-area section-padding-80-0" webesembly:section="footer">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row align-items-baseline justify-content-between">
                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Footer Logo -->
                        <div webesembly:module="logo" skin="footer" name="footer" />

                        <div webesembly:editable="true">
                            <h4>+12 345-678-9999</h4>
                            <span>Info.colorlib@gmail.com</span>
                            <span>856 Cordia Extension Apt. 356, Lake Deangeloburgh, South Africa</span>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Our Blog</h5>

                        <!-- Single Blog Area -->
                        <div class="latest-blog-area">
                            <a href="#" class="post-title">Freelance Design Tricks How</a>
                            <span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i> Jan 02, 2019</span>
                        </div>

                        <!-- Single Blog Area -->
                        <div class="latest-blog-area">
                            <a href="#" class="post-title">Free Advertising For Your Online</a>
                            <span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i> Jan 02, 2019</span>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-4 col-lg-2">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title" webesembly:editable="true">Links</h5>

                        <!-- Footer Nav -->
                        <div webesembly:module="menu" skin="footer" name="footer" />

                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-8 col-lg-4">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <div webesembly:editable="true">
                        <h5 class="widget-title">Subscribe Newsletter</h5>
                        <span>Subscribe our newsletter gor get notification about new updates.</span>
                        </div>

                        <!-- Newsletter Form -->
                        <form action="index.html" class="nl-form">
                            <input type="email" class="form-control" placeholder="Enter your email...">
                            <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copywrite Area -->
    <div class="container">
        <div class="copywrite-content">
            <div class="row align-items-center">
                <div class="col-12 col-md-8">
                    <!-- Copywrite Text -->
                    <div class="copywrite-text">
                        <div webesembly:module="text" skin="footer-text" name="footer" />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- Social Info -->
                    <div webesembly:module="social-links" />
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<!-- **** All JS Files ***** -->
<!-- jQuery 2.2.4 -->
<script src="{{asset('themes/hotel_roberto')}}/js/jquery.min.js"></script>
<!-- Popper -->
<script src="{{asset('themes/hotel_roberto')}}/js/popper.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('themes/hotel_roberto')}}/js/bootstrap.min.js"></script>
<!-- All Plugins -->
<script src="{{asset('themes/hotel_roberto')}}/js/roberto.bundle.js"></script>
<!-- Active -->
<script src="{{asset('themes/hotel_roberto')}}/js/default-assets/active.js"></script>

</body>

</html>
