<?php $__env->startSection('content'); ?>
    <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo e($error); ?></strong>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong><?php echo e(Session::get('success')); ?></strong> 
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">Create new user</div>
            <div class="card-body">
                <form action="<?php echo e(route('user.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">  
                        <label for="title">Name</label>
                        <input class="form-control" type="text" name="name" placeholder="">
                    </div>

                    <div class="form-group">  
                        <label for="content">E-mail</label>
                        <input class="form-control" type="text" name="email" placeholder="">
                    </div>

                    .<div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Store user</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>