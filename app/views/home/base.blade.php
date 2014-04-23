<!doctype html>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>prepHack</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="prepHack">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/jquery_ui.css') }}
	{{ HTML::style('css/bootstrap-theme.css') }}
	{{ HTML::script('js/bootstrap.js') }}
	{{ HTML::script('js/jquery_ui.js') }}
	{{ HTML::script('js/jquery_validate.js') }}
	{{ HTML::style('css/carousal.css') }}
	{{ HTML::style('css/base.css') }}


</head>
    <body>
    		<nav  class="navbar navbar-inverse navbar-static-top" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
				{{ HTML::link('/', 'prepHack', array('class' => 'navbar-brand')) }}
				 
						</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			 <ul class="nav navbar-nav">
			 	<li>{{ HTML::link('/', 'Home', array('class' => 'active', 'id' => 'first')) }}</li>
				<li>{{ HTML::link('problem/add', 'Add Problem') }}</li>

			 </ul>
			 			 <ul class="nav navbar-nav navbar-right">
			 	@if ( Auth::user() )
			 	<li>{{ HTML::link('profile/'.Auth::user()->username, 'Welcome, '.Auth::user()->username, array('class' => 'profile')) }}</li>
			 	<li>{{ HTML::link('logout', 'Logout') }}</li>
				
			 	@else
					<li>{{ HTML::link('login', 'Register/Login') }}</li>
				@endif

			</ul>


		</div>

	</nav>
	<div class="sidebar">
            @yield('sidebar')
        </div>
        <div class="container">
            @yield('content')
        </div>
        
    </body>
</html>