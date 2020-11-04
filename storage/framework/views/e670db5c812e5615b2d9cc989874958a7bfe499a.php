

<?php $__env->startSection('extra-js'); ?>
    <script>
        function toggleReplyComment(id){
            let element=document.getElementById('replyComment-' + id);
            element.classList.toggle('d-none');
        }
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Ca se passe près de chez vous !</h5>
                </div>
                <div class="panel-body">
                    <h5 class="panel-title"><?php echo e($topic->title); ?></h5>
                    <p><?php echo e($topic->content); ?></p>
                    <div >
                        <div > 
                            <small class="col-md-8 ">posté le <span class="badge badge-dark"> <?php echo e($topic->created_at->format('d/m/y à H:m')); ?></span></small>
                            par: <span class="badge badge-primary"><?php echo e($topic->user->nom); ?></span>
                        </div>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $topic)): ?>
                        <div class="col-md-8 col-md-offset-2 ">
                            <a href="<?php echo e(route('topics.edit', $topic)); ?>" class="btn btn-warning">Editer le topic</a>
                        </div>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $topic)): ?>
                        <form action="<?php echo e(route('topics.destroy',$topic)); ?>" method="POST"> 
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DElETE'); ?>
                            <button type="submit" class="btn btn-danger">suprimer</button>
                        </form>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h4> <i> Commentaires</i></h4>
    <?php $__empty_1 = true; $__currentLoopData = $topic->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="panel topic-commentaire">
            <div class="panel-body ">
                <?php echo e($comment->content); ?>

                <div class="d_flex justify-content-between aline-items-center">
                    <small class="col-md-8 ">Posté le <?php echo e($comment->created_at->format('d/m/y')); ?></small>
                    Auteur: <span class="badge badge-dark"><?php echo e($comment->user->nom); ?></span>
                </div>
            </div>
        </div>


        <?php $__currentLoopData = $comment->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replyCommenty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="panel commentaire-commentaire">
                <div class="panel-body ">
                    <?php echo e($replyCommenty->content); ?>

                    <div class="d_flex justify-content-between aline-items-center">
                        <small class="col-md-8 ">Posté le <?php echo e($replyCommenty->created_at->format('d/m/y')); ?></small>
                        Par: <span class="badge badge-dark"><?php echo e($replyCommenty->user->nom); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <?php if(auth()->guard()->check()): ?>
            <button  class="btn btn-info  reponse " onclick="toggleReplyComment(<?php echo e($comment->id); ?>)"  >Repondre</button>
            <form action="<?php echo e(route('comments.storeReply', $comment)); ?>"  class="d-none"  id="replyComment-<?php echo e($comment->id); ?>"  method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <textarea name="replyComment" class="form-control <?php $__errorArgs = ['replyComment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="replyComment" rows="5"></textarea>

                    <?php $__errorArgs = ['replyComment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div role="error" class="invalid-feedback"><?php echo e($errors->first('replyComment')); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button type="submit" class="btn btn-warning">repondre à ce commentaire</button>
            </form>           
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="alert alert-info">aucun commentaire pour cette discussion</div>
    <?php endif; ?>


<?php if(auth()->guard()->check()): ?>
    <div>
        <form action="<?php echo e(route('comments.store',$topic)); ?>" method="POST" >
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="content">Entrer votre commentaire</label>
                <textarea class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="content" id="content" rows="5"></textarea>
                <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                    <div class="invalid-feedback bg-danger "><?php echo e($errors->first('content')); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
            </div>
            <button type="submit" class=" btn btn-primary">Soumettre mon commentaire</button>
        </form>
    </div>
<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fil-rouge1\resources\views/topics/show.blade.php ENDPATH**/ ?>