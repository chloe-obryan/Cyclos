<?php $__env->startSection('content'); ?>

<div style="  margin-bottom: 20px;"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading "><span class="les-titres">Connexion</span> </div>
				<div class="panel-body">
					<?php if(count($errors) > 0): ?>
						<div class="alert alert-danger">
						    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
						    	<strong>Whoops!</strong> Une erreur est survenue.<br><br>
						    	<ul>
						    		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    			<li><?php echo e($error); ?></li>
						    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						    	</ul>
						</div>
					<?php endif; ?>

					<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('login')); ?>">
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

						<div class="form-group">
							<label class="col-md-4 control-label">Adresse E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Mot de passe</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Garder ma session active
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Connexion</button>

								<a class="btn btn-link" href="<?php echo e(url('/password/email')); ?>"> Vous avez oublié votre mot de passe ?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(':checkbox').radiocheck();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fil-rouge1\resources\views/auth/login.blade.php ENDPATH**/ ?>