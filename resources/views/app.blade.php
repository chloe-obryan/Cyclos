<!DOCTYPE html>
<html lang="fr">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ENTREPREdev | CYCLOS</title>

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}" defer></script>

		<!-- Styles -->

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/font-awesome-4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/timeline.css') }}" rel="stylesheet">
	<link href="{{ asset('Flat-UI-master/dist/css/flat-ui.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

	@yield('extra-js')
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>


	</head>
	<body >
		<nav class="navbar navbar-inverse navbar-fixed-top" id="navbar">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{url('/')}}">CYCLOS <img src="{{asset("img/logo.jpg")}}" width="100px" height="50px" alt="photo1"></a>
				</div>

				<div class="collapse menu_a navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav active">
						<li @yield('activeAccueil')><a href="{{url('/') }}">Accueil</a></li>
						@if (Auth::check())
						<li class="drop-down" @yield('activeEts/Ong')><a href="{{ route('entreprise/create') }}">Ets/Ong <i class="fa fa-arrow-circle-down"></i></a>
							<ul >
								<li @yield('activeEts/Ong') ><a href="{{ route('entreprise/create') }}">Nouveau</a></li>
								<li @yield('activePublier')><a href="{{ route('annonce/create') }}">Publier</a></li>
								<li @yield('activevision') class="drop-down"><a href="" >Visionner <i class="fa fa-arrow-circle-right"></i></a>
									<ul >
										<li @yield('activePublier')><a href="{{ route('annonce/create') }}">Annonces</a></li>
										<li @yield('activePublier')><a href="{{ route('annonce/create') }}">Récrutements</a></li>
										<li @yield('activePublier')><a href="{{ route('annonce/create') }}">Formations</a></li>
									</ul>

								</li>
							</ul>
						</li>

						<li class="drop-down"><a href="">Acteurs <i class="fa fa-arrow-circle-down"></i></a>
							<ul>
								<li @yield('activePublier')><a href="{{ url('acteurs/profil') }}">Les profils</a></li>
								<li @yield('activePublier')><a href="{{ route('annonce/create') }}">Projets</a></li>
							</ul>
						</li>
						@endif
						<li @yield('activeForum')><a href="{{ route('topics.index') }}">Forum</a></li>
						<li @yield('activepropos')><a href="">A propos</a></li>

					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="{{ url('login') }}">Connexion</a></li>
							<li><a href="{{ url('register') }}">S'inscrire</a></li>
						@else

							
							
						<?php
						$notifications = \Illuminate\Support\Facades\Auth::User()->notifications()->where('vu','=','0')->get();
						$nb_notif = $notifications->count();
					?>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<span class="glyphicon glyphicon-bell"></span>
							<span class="badge" style="background-color: #ffffff; color: #34495e">{{$nb_notif}}</span>
						</a>
						<ul class="dropdown-menu" role="menu">
								@foreach($notifications as $notification)

								<li id="notif{{$notification->id}}">
								<a href="{{route('notificationVu',$notification->id)}}">
									{{$notification->contenu}}<br>
									{{\Carbon\Carbon::createFromTimestamp(strtotime($notification->created_at))->diffForHumans()}}
								</a>
								</li>
								@endforeach
								<li role="presentation" class="divider"></li>
								<li class="text-center"><a href="{{route('notifier')}}">Toutes les notifications</a></li>
						</ul>
					</li>


							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->prenom }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{route('home')}}">
										<i class="fa fa-pencil-square-o"></i>Mon profil</a>
									</li>
									<li>
										<a href="{{ route('logout') }}"    
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										<span class="glyphicon glyphicon-off"  ></span> Se déconnecter</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</li>
									
									@can('manage-users')
									<li><a href="{{route('admin.users.index')}}" class="dropdown-item">liste des utilisateurs</a></li>
									@endcan
								</ul>

							</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>

		@yield('content')

		<!-- Scripts -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="{{ asset('Flat-UI-master/dist/js/flat-ui.min.js') }}"></script>
		<script src="{{ asset('Flat-UI-master/docs/assets/js/application.js') }}"></script>

		@yield('script_ajax')
		@yield('script_register')
		@yield('js')
	</body>
</html>
