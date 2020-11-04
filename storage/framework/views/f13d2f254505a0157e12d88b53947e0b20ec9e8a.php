

<?php $__env->startSection('extra-js'); ?>
<?php echo NoCaptcha :: renderJs (); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
   <h1>créer un topics</h1>
<form action="<?php echo e(route('topics.store')); ?>" method="POST">
<?php echo csrf_field(); ?>
    <div class="form-group ">
        <label  for="title">titre</label>
        <input type="text" class="form-control" <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> name="title" id="title">
        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="invalid-feedback text-danger"><?php echo e($errors->first('title')); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-group">
        <label for="content">vote sujet</label>
        <textarea type="text" class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="content" id="content" rows="5"> </textarea>
        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback text-danger"><?php echo e($errors->first('content')); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
<div class="group">
    <?php echo NoCaptcha :: display(); ?>

    <?php if( $errors -> has ( 'g-recaptcha-response' )): ?>
    <span class = "help-block" >
        <strong> <?php echo e($errors -> first ( 'g-recaptcha-response' )); ?> </strong>
    </span>
    <?php endif; ?>
</div>
    <button type="submit" class="btn btn-primary">créer un topic</button>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fil-rouge1\resources\views/topics/create.blade.php ENDPATH**/ ?>