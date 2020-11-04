
<?php $__env->startSection('activeEts/Ong'); ?>
class="active"
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div style="  margin-bottom: 20px;"></div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
					<form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('entreprise/store')); ?>">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4><span class="glyphicon glyphicon-pencil"></span> Enregistrer mon entreprise</h4></div>
                                <div class="panel-body">

                                        <div class="form-group">
                                                <label class="col-md-4 control-label">Nom</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                      <input type="text" class="form-control" name="nom" value="<?php echo e(old('nom')); ?>" required>
                                                      <span class="input-group-addon">CYCLOS</span>
                                                    </div>
                                                </div>
                                        </div>   
                                            <div class="form-group">
                                                    <label class="col-md-4 control-label">adress</label>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                          <input type="text" class="form-control" name="adress" value="<?php echo e(old('adress')); ?>" required>
                                                          <span class="input-group-addon">CYCLOS</span>
                                                        </div>
                                                    </div>
                                            </div>   

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Code Postal</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                              <input type="text" class="form-control" name="codePostal" value="<?php echo e(old('codePostal')); ?>" required>
                                              <span class="input-group-addon">CYCLOS</span>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                            <label class="col-md-4 control-label">Site Internet</label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="datepicker" name="siteInternet" value="<?php echo e(old('siteInternet')); ?>" required>
                                            </div>
                                    </div>

                                    <div class="form-group">
                                            <label class="col-md-4 control-label">ville</label>
                                            <div class="col-md-6">
                                                    <select class="form-control" name="villes_id" class="form-control input-md">
                                                            <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ville): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($ville->id); ?>"><?php echo e($ville->nom); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                            </div>
                                    </div>
                                        <div class="form-group">
                                                <label class="col-md-4 control-label">Secteur</label>
                                                <div class="col-md-6">
                                                        <select class="form-control" name="secteurs_id" class="form-control input-md">
                                                                <?php $__currentLoopData = $secteurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secteur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($secteur->id); ?>"><?php echo e($secteur->secteurActivite); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label class="col-md-4 control-label">Pays</label>
                                                <div class="col-md-6">
                                                        <select class="form-control" name="pays_id" class="form-control input-md">
                                                                <?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($pays->id); ?>"><?php echo e($pays->nom); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                </div>
                                        </div>
        
                                    <div class="form-group">
                                       <label class="col-md-4 control-label">Logo</label>
                                       <div class="col-md-6">
                                           <input type="file" class="form-control" name="logo" value="<?php echo e(old('logo')); ?>" pattern="^[0-9]+$">
                                       </div>
                                    </div>

                                </div>
                            </div>

                        <div class="panel panel-default">
                                <div class="panel-body">
                                   
                                <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                               Enregister
                                            </button>
                                        </div>
                                </div>
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fil-rouge1\resources\views/entreprise/forme.blade.php ENDPATH**/ ?>