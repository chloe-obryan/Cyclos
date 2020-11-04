<!DOCTYPE html>
<html lang="fr">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ENTREPREdev | CYCLOS</title>

		<!-- Scripts -->
		<script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

		<!-- Styles -->

	<link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('/css/font-awesome-4.3.0/css/font-awesome.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('/css/timeline.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('Flat-UI-master/dist/css/flat-ui.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('/css/style.css')); ?>" rel="stylesheet">

	<?php echo $__env->yieldContent('extra-js'); ?>
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
					<a class="navbar-brand" href="<?php echo e(url('/')); ?>">CYCLOS <img src="<?php echo e(asset("img/logo.jpg")); ?>" width="100px" height="50px" alt="photo1"></a>
				</div>

				<div class="collapse menu_a navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav active">
						<li <?php echo $__env->yieldContent('activeAccueil'); ?>><a href="<?php echo e(url('/')); ?>">Accueil</a></li>
						<?php if(Auth::check()): ?>
						<li class="drop-down" <?php echo $__env->yieldContent('activeEts/Ong'); ?>><a href="<?php echo e(route('entreprise/create')); ?>">Ets/Ong <i class="fa fa-arrow-circle-down"></i></a>
							<ul >
								<li <?php echo $__env->yieldContent('activeEts/Ong'); ?> ><a href="<?php echo e(route('entreprise/create')); ?>">Nouveau</a></li>
								<li <?php echo $__env->yieldContent('activePublier'); ?>><a href="<?php echo e(route('annonce/create')); ?>">Publier</a></li>
								<li <?php echo $__env->yieldContent('activevision'); ?> class="drop-down"><a href="" >Visionner <i class="fa fa-arrow-circle-right"></i></a>
									<ul >
										<li <?php echo $__env->yieldContent('activePublier'); ?>><a href="<?php echo e(route('annonce/create')); ?>">Annonces</a></li>
										<li <?php echo $__env->yieldContent('activePublier'); ?>><a href="<?php echo e(route('annonce/create')); ?>">Récrutements</a></li>
										<li <?php echo $__env->yieldContent('activePublier'); ?>><a href="<?php echo e(route('annonce/create')); ?>">Formations</a></li>
									</ul>

								</li>
							</ul>
						</li>

						<li class="drop-down"><a href="">Acteurs <i class="fa fa-arrow-circle-down"></i></a>
							<ul>
								<li <?php echo $__env->yieldContent('activePublier'); ?>><a href="<?php echo e(url('acteurs/profil')); ?>">Les profils</a></li>
								<li <?php echo $__env->yieldContent('activePublier'); ?>><a href="<?php echo e(route('annonce/create')); ?>">Projets</a></li>
							</ul>
						</li>
						<?php endif; ?>
						<li <?php echo $__env->yieldContent('activeForum'); ?>><a href="<?php echo e(route('topics.index')); ?>">Forum</a></li>
						<li <?php echo $__env->yieldContent('activepropos'); ?>><a href="">A propos</a></li>

					</ul>

					<ul class="nav navbar-nav navbar-right">
						<?php if(Auth::guest()): ?>
							<li><a href="<?php echo e(url('login')); ?>">Connexion</a></li>
							<li><a href="<?php echo e(url('register')); ?>">S'inscrire</a></li>
						<?php else: ?>

							
							
						<?php
						$notifications = \Illuminate\Support\Facades\Auth::User()->notifications()->where('vu','=','0')->get();
						$nb_notif = $notifications->count();
					?>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<span class="glyphicon glyphicon-bell"></span>
							<span class="badge" style="background-color: #ffffff; color: #34495e"><?php echo e($nb_notif); ?></span>
						</a>
						<ul class="dropdown-menu" role="menu">
								<?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<li id="notif<?php echo e($notification->id); ?>">
								<a href="<?php echo e(route('notificationVu',$notification->id)); ?>">
									<?php echo e($notification->contenu); ?><br>
									<?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($notification->created_at))->diffForHumans()); ?>

								</a>
								</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<li role="presentation" class="divider"></li>
								<li class="text-center"><a href="<?php echo e(route('notifier')); ?>">Toutes les notifications</a></li>
						</ul>
					</li>


							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo e(Auth::user()->prenom); ?> <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="<?php echo e(route('home')); ?>">
										<i class="fa fa-pencil-square-o"></i>Mon profil</a>
									</li>
									<li>
										<a href="<?php echo e(route('logout')); ?>"    
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										<span class="glyphicon glyphicon-off"  ></span> Se déconnecter</a>
										<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
											<?php echo csrf_field(); ?>
										</form>
									</li>
									
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-users')): ?>
									<li><a href="<?php echo e(route('admin.users.index')); ?>" class="dropdown-item">liste des utilisateurs</a></li>
									<?php endif; ?>
								</ul>

							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</nav>

		<?php echo $__env->yieldContent('content'); ?>

		<!-- Scripts -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="<?php echo e(asset('Flat-UI-master/dist/js/flat-ui.min.js')); ?>"></script>
		<script src="<?php echo e(asset('Flat-UI-master/docs/assets/js/application.js')); ?>"></script>

		<?php echo $__env->yieldContent('script_ajax'); ?>
		<?php echo $__env->yieldContent('script_register'); ?>
		<?php echo $__env->yieldContent('js'); ?>
	</body>
</html>
<?php /**PATH C:\laragon\www\fil-rouge1\resources\views/app.blade.php ENDPATH**/ ?>