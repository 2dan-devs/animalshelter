<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Animal Shelter</title>
	<!-- Tell search engines not to follow or index admin pages -->
    <meta name="robots" content="noindex,nofollow"/>

    <!--############## STYLES AND SCRIPTS THAT MUST BE LOADED BEFORE BODY ############-->
    <!-- Normalize 3.0.2 CSS -->
    {{ HTML::style('admin/bower_components/foundation/css/normalize.css') }}
    <!-- Zurb Foundation 5.5.0 CSS -->
    {{ HTML::style('admin/bower_components/foundation/css/foundation.css') }}
    <!-- Modernizr 2.8.3 JS -->
    {{ HTML::script('admin/bower_components/modernizr/modernizr.js') }}
    <!-- Font-Awesome 4.2.0 -->
    {{ HTML::style('admin/bower_components/font-awesome/css/font-awesome.min.css') }}
    <!-- jQuery-UI Smoothnees Theme -->
    {{ HTML::style('admin/bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css') }}
    <!-- Custom CSS file for "master.blade.php" -->
    {{ HTML::style('admin/css/admin-master.css') }}
    <!-- Allow views to load custom view specific styles -->
    @yield('styles')
</head>
<body>
	<!--[if lt IE 10]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Top Nav Bar & Banner -->
    <div class="contain-to-grid">
        <div class="top-banner">
            <h2 class="top-banner-text"><b>Animal Shelter</b></h2>
            <h5 class="top-banner-text">Administrator</h5>
        </div>
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name"><h1><a href="#">Logged In: Username</a></h1></li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span>More</span></a></li>
            </ul>
            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                  <li class="has-dropdown">
                    <a href="#">Actions</a>
                    <ul class="dropdown">
                      <li class="top-bar-menu-item"><a href="{{ URL::to('admin/dashboard/animal/create') }}">Add Record</a></li>
                      <li class="top-bar-menu-item"><a href="{{ URL::to('admin/dashboard/animal') }}">View / Edit Animals</a></li>
                      <li class="top-bar-menu-item"><a href="#">Edit Newsletters Subscribers</a></li>
                      <li class="top-bar-menu-item"><a href="#">Edit Species Breeds Status</a></li>
                      <li class="top-bar-menu-item"><a href="#">Edit ContactUs AboutUs</a></li>
                      <li class="top-bar-menu-item"><a href="#">Edit Events</a></li>
                    </ul>
                  </li>
                  <li class="divider"></li>
                  <li class="top-bar-menu-item"><a href="{{ URL::to('admin/dashboard') }}">Dashboard</a></li>
                  <li class="divider"></li>
                  <li class="top-bar-menu-item"><a href="#">Edit Profile</a></li>
                  <li class="divider"></li>
                  <li class="top-bar-menu-item"><a href="#"> Log Out </a></li>
                </ul>
            </section>
        </nav>
    </div><br>
    <!-- End Top Nav Bar & Banner -->

    <!-- Main Content -->
    <div class="row">
        <div class="large-12 columns view-title">

            <!-- Title from View -->
            <h3><b>{{$title}}</b></h3>
            <br>
            <!-- Show session messages -->
            @if (Session::has('message')) {{ Session::get('message') }} @endif
            <!-- End show session messages -->
        </div>

        <!-- Show validation errors -->
        @if($errors->has())
        <div class="large-12 columns">
            <div class="alert-box alert val-top-box-errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        <!-- End show validation errors -->

        <!-- Main Content -->
        <div class="large-12 columns">
            @yield('content')
        </div>
        <!-- End Main Content -->
    </div>
    <div class="footer-wrap">
        <div class="row">
            <div class="large-12 columns"><br>
                <ul class="left footer-links">
                    <li><a href="">Home</a></li>
                    <li><a href="">Adopt</a></li>
                    <li><a href="">Volunteer</a></li>
                    <li><a href="">Donate</a></li>
                </ul>
                <ul class="right social-icons">
                    <li class="fa fa-inverse fa-lg fa-facebook"></li>
                    <li class="fa fa-inverse fa-lg fa-youtube"></li>
                    <li class="fa fa-inverse fa-lg fa-instagram"></li>
                </ul>
            </div>
            <div class="large-12 columns">
                <p class="copyright-credits">&copy 2015 Copyrighted. Developed by
                    <a href="http://www.danilonavas.net" target="blank">D.Navas</a> and D.Silver.
                </p>
            </div>
        </div>
    </div>

	<!--############### SCRIPTS THAT CAN BE LOADED AFTER PAGE LOADS ###############-->
    <!-- jQuery 2.1.3 -->
    {{ HTML::script('admin/bower_components/jquery/dist/jquery.min.js') }}
    <!-- jQuery-UI 1.11.2 -->
    {{ HTML::script('admin/bower_components/jquery-ui/jquery-ui.min.js') }}
    <!-- FastClick -->
    {{ HTML::script('admin/bower_components/fastclick/lib/fastclick.js') }}
	<!-- Foundation Responsive JS -->
    {{ HTML::script('admin/bower_components/foundation/js/foundation.min.js') }}
    <!-- Custom JS file for "master.blade.php" -->
    {{ HTML::script('admin/js/admin-master.js') }}
    <!-- Allow views to load custom view specific scripts -->
    @yield('scripts')

    <!-- Initialize Foundation Framework -->
    <script>
        $(document).foundation();
    </script>
    <!-- End Foundation Initialization -->
</body>
</html>