

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3><strong>Liste des utilisateurs</strong></h3></div>
                    <div class="panel-body">
                        <table id="produits" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>   
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e(implode(', ', $user->roles()->get()->pluck('name')->toArray())); ?></td>
                                    <td >
                                    <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>"><button class="btn btn-primary">Editer</button></a>
                                        <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST" style="float: left">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-warning">Suprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
           </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\fil-rouge1\resources\views/admin/users/index.blade.php ENDPATH**/ ?>