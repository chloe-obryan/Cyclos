

<?php $__env->startSection('activeProfil'); ?>
class="active"
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div style="  margin-bottom: 20px;">

</div>

<div class="container">


    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
            	<div class="panel-heading">
                    <h5>
                        Voir les profils
                    </h5>
                </div>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="panel-body">
                    <div class="col-xs-4">
                            <a href="">
                                <div class="thumbnail">
                                    <img class="img-rounded" src=" <?php echo e(asset('storage').'/'.$user->photo); ?>" alt="photo de profil">
                                </div>
                            </a>
                       </div>
                <div class="col-xs-8">
                           <a href="">
                               <h5><?php echo e($user->nom.' '.$user->prenom); ?><br>
                                    <small> <?php echo e($user->genre); ?><br>
                                    (<?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($user->date_nais))->age.' ans'); ?>)
                                    </small>
                               </h5>
                               <h5>
                                   Ville :<span style="color: cornflowerblue;"><?php echo e($user->ville->nom); ?></span> <br><br>
                                   Statut :<span style="color: cornflowerblue;"><?php echo e($user->fonction); ?></span> <br><br>
                                   Niveau :<span style="color: cornflowerblue;"><?php echo e($user->diplome->intitule); ?></span> 
                               </h5>
                           </a>
               </div>
            </div> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        <div class="col-md-6">
            <div class="panel panel-default">
            	<div class="panel-heading"><h5>Ca se passe près de chez vous !</h5></div>
            	<div class="panel-body">
                  
            	</div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fil-rouge1\resources\views/acteurs/profil.blade.php ENDPATH**/ ?>