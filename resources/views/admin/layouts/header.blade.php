@if(Auth::guest())
	<div class="col s8 offset-s2 m4 offset-m4 l2 offset-l5 center-align">
        <br>
        <img id="logo" src="{{asset('images/logo.png')}}" alt="{{ config('app.name') }}">
    </div>
@else
	<nav class="menu">
		<div class="nav-wrapper">
			<ul class="left">
				<li class="hide-on-large-only">
					<a href="#" data-target="side-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				</li>
				<li><a href="#">Admin Panel</a></li>
			</ul>
			<ul id="top-menu" class="right">
				<li>
					<a href="#" class="dropdown-trigger" data-target="dropdown1">
						<i class="material-icons">more_vert</i>
					</a>
				</li>
				
			</ul>
			<ul id="dropdown1" class="dropdown-content">
				<li {{ Request::is('admin/account/password') ? ' class=active' : null }}><a href="{{ route('account.password') }}">Change Password</a></li>
		    	<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
		    	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
			</ul>
		</div>
		<ul id="side-menu" class="sidenav sidenav-fixed">
			<li class="title"><a href="{{ route('admin.home.index') }}">
				<img src="{{asset('images/logo.png')}}" alt="{{ config('app.name') }}">
			</a></li>
			<li {{ Request::is('admin') ? ' class=active' : null }}><a href="{{ route('admin.home.index') }}">Home</a></li>
			@if(\Auth::user()->admin)
				<li {{ Request::is('admin/users*') ? ' class=active' : null }}><a href="{{ route('admin.users.index') }}">Users</a></li>
			@endif

		</ul>
	</nav>
@endif