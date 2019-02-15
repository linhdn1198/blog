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
<div class="row text-center">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">POSTED</div>
        
            <div class="card-body">
                <h1><?php echo e($posts_count); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">TRASHED</div>
        
            <div class="card-body">
                <h1><?php echo e($trashed_count); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">USERS</div>
        
            <div class="card-body">
                <h1><?php echo e($users_count); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">CATEGORIES</div>
        
            <div class="card-body">
                <h1><?php echo e($categories_count); ?></h1>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>