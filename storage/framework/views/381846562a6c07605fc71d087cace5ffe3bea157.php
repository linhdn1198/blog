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
        <div class="card-header">Edit blog settings</div>
            <div class="card-body">
                <form action="<?php echo e(route('settings.update')); ?>" method="post" >
                    <?php echo csrf_field(); ?>
                    <div class="form-group">  
                        <label for="name">Site name</label>
                        <input class="form-control" type="text" name="site_name" placeholder="" value="<?php echo e($settings->site_name); ?>">
                    </div>

                    <div class="form-group">  
                        <label for="contact_number">Contact phone</label>
                        <input class="form-control" type="text" name="contact_number" placeholder="" value="<?php echo e($settings->contact_number); ?>">
                    </div>

                    <div class="form-group">  
                        <label for="contact_email">Contact email</label>
                        <input class="form-control" type="text" name="contact_email" placeholder="" value="<?php echo e($settings->contact_email); ?>">
                    </div>

                    <div class="form-group">  
                        <label for="adress">Adress</label>
                        <input class="form-control" type="text" name="address" placeholder="" value="<?php echo e($settings->address); ?>">
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update site settings</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>