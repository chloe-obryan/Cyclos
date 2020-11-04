<?php $__env->startSection('content'); ?>
<div style="  margin-bottom: 20px;">

</div>

<div class="container">


    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
            	<div class="panel-heading"><h5>Votre profil
                    <div class="pull-right"><a href="<?php echo e(route('user.edit',$user->id)); ?>">Modifier
                    <i class="fa fa-pencil-square-o"></i></a></div>
                    </h5>
                </div>
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
                                   <h3><?php echo e($user->nom.' '.$user->prenom); ?><br>
                                        <small> <?php echo e($user->genre); ?><br>
                                        (<?php echo e(\Carbon\Carbon::createFromTimestamp(strtotime($user->date_nais))->age.' ans'); ?>)
                                        </small>
                                   </h3>
                               </a>
                   
                   
                        <table>
                           <tr>
                              <td><h5>Ville:&nbsp;&nbsp;<?php echo e($user->ville->nom); ?></h5></td>
                            
                           </tr>
                           <tr>
                             <td>
                                 <h5>
                                    Mes préférences:&nbsp;&nbsp;
                                 </h5>
                             </td>
                             <td>
                               
                             </td>
                           </tr>
                        </table>
                   </div>
                </div>
                <div class="panel-body">
                   <div id="jumb">
                       <h4>Ma bio</h4>
                       <p id="text_jump">
                            <?php if(!empty($user->description)): ?>
                            <?php echo e($user->description); ?>

                            <?php else: ?>
                            Vous n'avez renseigné aucune description
                            <?php endif; ?>
                       </p>
                   </div>
                </div>
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

    <div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h5>LES DERNIERE ANNONCES </h5></div>
				<div class="panel-body">
                   
			    </div>
		    </div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h5>TOUTES LES ANNONCES</h5></div>
				<div class="panel-body">
                   
			    </div>
		    </div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fil-rouge1\resources\views/home.blade.php ENDPATH**/ ?>