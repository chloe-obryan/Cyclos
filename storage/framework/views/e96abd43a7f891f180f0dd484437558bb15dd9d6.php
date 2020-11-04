
<?php $__env->startSection('content'); ?>
<div style="  margin-bottom: 20px;"></div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
            	<div class="panel-heading"><h5 class="">
                   <a class="panel-heading" href="<?php echo e(route('topics.create')); ?>">Nouvelle discussion
                    <i class="fa fa-pencil-square-o"></i></a>
                    </h5>
                </div>

                <div class="panel-body pt-6">
                    a
                    <h4>Catégories</h4>
                  <ol>
                      <li> <a href=""> Formations</a></li>
                      <li> <a href=""> Annonces</a></li>
                      <li> <a href=""> Planet Idées</a></li>
                      <li> <a href=""> Conseils et entreprise</a></li>

                  </ol>
                </div>
                </div>
            </div>

        <div class="col-md-8">
            <div class="panel panel-default">
            	<div class="panel-heading"><h5 class="les-titres">Discussions</h5></div>
            	<div class="panel-body">
                    <div class="list-group">
                        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="list-group-item">
                            <h4><a href="<?php echo e(route('topics.show',$topic)); ?>"><?php echo e($topic->title); ?></a></h4>
                            <p><?php echo e($topic->content); ?></p>
                                <div class="d_flex justify-content-between aline-items-center">
                                    <div><i class="fa fa-comments"></i><small class="color-red">  <?php echo e($topic->comments->count()); ?></small></div>
                                    <small class="col-md-8 ">Posté le <?php echo e($topic->created_at->format('d/m/y à H:m')); ?></small>
                                    Auteur: <span class="badge badge-primary"><?php echo e($topic->user->nom); ?></span>
                                </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php echo e($topics->links()); ?>

            	</div>
            </div>
        </div>
    </div>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fil-rouge1\resources\views/topics/index.blade.php ENDPATH**/ ?>