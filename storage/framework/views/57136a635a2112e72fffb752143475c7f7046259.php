<?php $__env->startSection('activePublier'); ?>
class="active"
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('DateTimePicker/css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet" media="screen">

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

					<form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('annonce/store')); ?>">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        
                                
                        <h3>PUBLIER UNE ANNONCE</h3>
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4><span class="glyphicon glyphicon-pencil"></span> Détails </h4></div>
                                <div class="panel-body">

                                        <div class="form-group">
                                                <label class="col-md-4 control-label">Titre de l'annonce</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                      <input type="text" class="form-control" name="titre" value="<?php echo e(old('titre')); ?>" required>
                                                      <span class="input-group-addon">CYCLOS</span>
                                                    </div>
                                                </div>
                                            </div>   
                                            <div class="form-group">
                                                    <label class="col-md-4 control-label">Promoteur</label>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                          <input type="text" class="form-control" name="promoteur" value="<?php echo e(old('promoteur')); ?>" required>
                                                          <span class="input-group-addon">CYCLOS</span>
                                                        </div>
                                                    </div>
                                                </div>   

                                                
                                        <div class="form-group">
                                                <label class="col-md-4 control-label">Type d'annonce</label>
                                                <div class="col-md-8">
                                                    <div class="btn-group" data-toggle="buttons">
                                                      <label class="btn btn-default">
                                                        <input type="radio" name="type" value="stage"> Stage  
                                                      </label>
                                                      <label class="btn btn-default active">
                                                        <input type="radio" name="type" value="avisRec" checked>Recrutement
                                                      </label>
                                                      <label class="btn btn-default">
                                                        <input type="radio" name="type" value="ideeEts">Idée
                                                      </label>
                                                      <label class="btn btn-default">
                                                            <input type="radio" name="type" value="appelProj">Appel à projet
                                                          </label>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Adress1</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                              <input type="text" class="form-control" name="adress1" value="<?php echo e(old('adress1')); ?>" required>
                                              <span class="input-group-addon">CYCLOS</span>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="form-group">
                                            <label class="col-md-4 control-label">Date</label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" id="datepicker" name="date" value="<?php echo e(old('date')); ?>" required>
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
                                       <label class="col-md-4 control-label">Contact</label>
                                       <div class="col-md-6">
                                           <input type="number" class="form-control" name="num_tel" value="<?php echo e(old('num_tel')); ?>" pattern="^[0-9]+$">
                                       </div>
                                    </div>

                                </div>
                            </div>

                        <div class="panel panel-default">
                            <div class="panel-heading"><h4><span class="glyphicon glyphicon-list-alt"></span> Description </h4></div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Veuillez ajouter plus de détails à votre annonce.</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="description" rows="6" style="resize: none" ><?php echo e(old('description')); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-md-4 control-label">Exigences</label>
                                            <div class="col-md-6">
                                                <textarea class="form-control" name="exigence" rows="6" style="resize: none" ><?php echo e(old('exigence')); ?></textarea>
                                            </div>
                                        </div>
                                <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Publier
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

<?php $__env->startSection('maps_onload'); ?>
    onload="initialize()"
<?php $__env->stopSection(); ?>

<?php $__env->startSection('maps_script'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places&language=fr&region=dz"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script_maps_autocomplete'); ?>
    <script type="text/javascript" src="<?php echo e(asset('DateTimePicker/js/bootstrap-datetimepicker.js')); ?>" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo e(asset('DateTimePicker/js/locales/bootstrap-datetimepicker.fr.js')); ?>" charset="UTF-8"></script>

	<script>
	var now = new Date();
	var yyyy   = now.getFullYear().toString();
	var yyyyend   = (now.getFullYear()+1).toString();
    var mm     = (now.getMonth()+1).toString();
    var dd     = now.getDate().toString();
    var hh     = ((now.getHours()+2)%24).toString();
    var ii     = now.getMinutes().toString();
    if((now.getHours()+2)>=24){dd++}
    $('#form_datetime').datetimepicker({
            language:  'fr',
            format: 'yyyy-mm-dd hh:ii',
            weekStart: 7,
            todayBtn:  1,
            autoclose: true,
            startDate: yyyy+"-"+mm+"-"+dd+" "+hh+":"+ii,
            endDate: yyyyend+"-"+mm+"-"+dd+" "+hh+":"+ii,
            minuteStep: 30
        });
    </script>

    <script src="<?php echo e(asset('js/maps_autocomplete.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fil-rouge1\resources\views/annonce/publier.blade.php ENDPATH**/ ?>