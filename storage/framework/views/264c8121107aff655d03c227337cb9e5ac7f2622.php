<?php $__env->startSection('content'); ?>
<?php if(Session::has('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong><?php echo e(Session::get('error')); ?></strong>
    </div>
<?php endif; ?>
<?php if(Session::has('info')): ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong><?php echo e(Session::get('info')); ?></strong> 
</div>
<?php endif; ?>
<div class="card">
    <div class="card-header primary">Dashboard</div>

    <div class="card-body">
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        You are logged in!
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>