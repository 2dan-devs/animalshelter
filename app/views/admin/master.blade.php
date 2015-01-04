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

    <!-- Top Bar -->
    <div class="row">
        <div class="top-banner">
            <h2 class="top-banner-text"><b>Animal Shelter</b></h2>
            <h4 class="top-banner-text">Administrator Site</h4>
        </div>
    </div>
    <div class="row">
        <div class="large-12">
            <nav class="top-bar" data-topbar role="navigation">
                <ul class="title-area">
                    <li class="name"><h1><a href="#">Logged In: Username</a></h1></li>
                    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                </ul>
                <section class="top-bar-section"> <!-- Right Nav Section -->
                    <ul class="right">
                      <li><a href="#">Edit Profile</a></li>
                      <li class="divider"></li>
                      <li class="active"><a href="#">Log Out</a></li>
                    </ul>
                </section>
            </nav>
        </div>
    </div><br>
    <!-- End Top Bar -->

    <!-- Main Content -->
    <div class="row">
        <div class="large-12 columns">
            <section id="main-content">
                <!-- Template Title -->
                <div class="row">
                    <div class="large-12 columns view-title">
                        <h3><b>{{$title}}</b></h3>
                        <!-- Show session messages -->
                        @if (Session::has('message'))<div class="alert-box success radius">{{ Session::get('message') }}</div>@endif
                    </div>
                </div><br>
                <!-- End Template Title -->
                @yield('content')
            </section>
        </div>
    </div>
    <!-- End Main Content -->

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
    {{ HTML::script('admin/js/admin-main.js') }}
    <!-- Allow views to load custom view specific scripts -->
    @yield('scripts')

    <!-- Initialize Foundation Framework. Define our JavaScript elements just by using HTML5 data-attributes -->
    <script>
        $(document).foundation();
    </script>
    <!-- End Foundation Initialization -->
</body>
</html>