<?php $__env->startSection('content'); ?>
<div class="card">
        <div class="card-header">Published categories</div>
    
        <div class="card-body">
            <?php if(Session::has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo e(Session::get('success')); ?></strong> 
            </div>
            <?php endif; ?>
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Category name</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>