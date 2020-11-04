


 <?php $__env->startSection('content'); ?>

 <div class="content-wrapper image-arriere">
<br>
 <h4 class="text-center text-black">ENREGISTRER </h4>

 <form class="form-horizontal "action=" <?php echo e(url('ajouter-diplome')); ?>" method="post">

<div class="page-sectio d-flex">
<?php echo csrf_field(); ?>
<div class="form-group" >
  <label class="col-md-4 control-label text-black"  for="">Diplome</label>  
  <div class="col-md-4">
  <input id="" name="intitule" type="text" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-4">
    <button id="button1id" name="button1id" class="btn btn-primary"  type="submit">Ajouter</button>
    <button id="button2id" name="button2id" class="btn btn-danger"  type="reset">Annuler</button>
  </div>
</div>
</div>

</form>

<form class="form-horizontal "action=" <?php echo e(url('ajouter-ville')); ?>" method="post">

<div class="page-sectio d-flex">
<?php echo csrf_field(); ?>
<div class="form-group" >
  <label class="col-md-4 control-label text-black"  >Ville</label>  
  <div class="col-md-4">
  <input id="" name="nom" type="text" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-4">
    <button id="button1id" name="button1id" class="btn btn-primary"  type="submit">Ajouter</button>
    <button id="button2id" name="button2id" class="btn btn-danger"  type="reset">Annuler</button>
  </div>
</div>
</div>

</form>

<form class="form-horizontal "action=" <?php echo e(url('ajouter-secteur')); ?>" method="post">

<div class="page-sectio d-flex">
<?php echo csrf_field(); ?>
<div class="form-group" >
  <label class="col-md-4 control-label text-black"  for="">Secteur</label>  
  <div class="col-md-4">
  <input id="" name="secteurActivite" type="text"  class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-4">
    <button id="button1id" name="button1id" class="btn btn-primary"  type="submit">Ajouter</button>
    <button id="button2id" name="button2id" class="btn btn-danger"  type="reset">Annuler</button>
  </div>
</div>
</div>

</form>

<form class="form-horizontal "action=" <?php echo e(url('ajouter-pays')); ?>" method="post">

  <div class="page-sectio d-flex">
  <?php echo csrf_field(); ?>
  <div class="form-group" >
    <label class="col-md-4 control-label text-black"  for="">Pays</label>  
    <div class="col-md-4">
    <input id="" name="nom" type="text"  class="form-control input-md">
      
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-md-4 control-label" for="button1id"></label>
    <div class="col-md-4">
      <button id="button1id" name="button1id" class="btn btn-primary"  type="submit">Ajouter</button>
      <button id="button2id" name="button2id" class="btn btn-danger"  type="reset">Annuler</button>
    </div>
  </div>
  </div>
  
  </form>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fil-rouge1\resources\views/forme/particulier.blade.php ENDPATH**/ ?>