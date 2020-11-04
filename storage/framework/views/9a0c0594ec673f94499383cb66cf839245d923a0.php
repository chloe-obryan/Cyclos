<?php $__env->startSection('content'); ?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Editer votre profil</h4></div>
				<div class="panel-body">
			

					<form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('user.update',$user)); ?>" >
						<?php echo csrf_field(); ?>
						<?php echo method_field('PATCH'); ?>
						<div class="well text-center"><h4>Vos coordonnées</h4></div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nom</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nom" value="<?php echo e($user->nom); ?>" required>
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Prenom</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="prenom" value="<?php echo e($user->prenom); ?>" required>
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Civilité</label>
							<div class="col-md-6">
							    <div class="btn-group" data-toggle="buttons">
                                  <label class="btn btn-default
                                  <?php if($user->genre == 'Homme'): ?>
                                  <?php echo e('active'); ?>

                                  <?php endif; ?>
                                  ">
                                    <input type="radio" name="genre" value="Homme"
                                    <?php if($user->genre == 'Homme'): ?>
                                    <?php echo e('checked'); ?>

                                    <?php endif; ?>
                                    > Homme
                                  </label>
                                  <label class="btn btn-default
                                    <?php if($user->genre == 'Femme'): ?>
                                    <?php echo e('active'); ?>

                                    <?php endif; ?>
                                  ">
                                    <input type="radio" name="genre" value="Femme"
                                    <?php if($user->genre == 'Femme'): ?>
                                    <?php echo e('checked'); ?>

                                    <?php endif; ?>
                                    > Femme
                                  </label>
                                </div>
                            </div>
						</div>

						<div class="form-group">
                            <label class="col-md-4 control-label">Date de naissance</label>
                        	<div class="col-md-6">
                        		<input type="text" class="form-control" id="datepicker" name="date_nais" value="<?php echo e($user->date_nais); ?>" required>
                        	</div>
                        </div>

                        <div class="form-group">
							<label class="col-md-4 control-label">Numéro de téléphone</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="num_tel" value="<?php echo e($user->num_tel); ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">ville</label>
							<div class="col-md-6">
									<select class="form-control" name="villes_id" class="form-control input-md">
											<?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ville): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($user->ville->id); ?>"><?php echo e($user->ville->nom); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
							</div>
					</div>


                        <div class="form-group">
                        	<label class="col-md-4 control-label">Présentation</label>
                        	<div class="col-md-6">
                        		<textarea class="form-control" name="description" rows="6" style="resize:none"><?php echo e($user->description); ?></textarea>
                        	</div>
                        </div>

                        <div class="form-group">
                        	<label class="col-md-4 control-label">Votre photo</label>
                            <div class="col-md-6">
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="thumbnail">
                                <img src="<?php echo e(asset('storage').'/'.$user->photo); ?>" alt="photo de profil" class="img-rounded">
                                </div>
                              </div>

                            </div>

                        	<input type="file" name="photo">
                        	</div>
                        </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Enregistrer
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fil-rouge1\resources\views/acteurs/edit.blade.php ENDPATH**/ ?>