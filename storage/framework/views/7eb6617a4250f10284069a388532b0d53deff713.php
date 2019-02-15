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
        <div class="card-header">Edit your profile</div>
            <div class="card-body">
                <form action="<?php echo e(route('user.update')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">  
                        <label for="name">Username</label>
                        <input class="form-control" type="text" name="name" placeholder="" value="<?php echo e($user->name); ?>">
                    </div>

                    <div class="form-group">  
                        <label for="email">E-mail</label>
                        <input class="form-control" type="text" name="email" placeholder="" value="<?php echo e($user->email); ?>">
                    </div>

                    <div class="form-group">  
                        <label for="password">New password</label>
                        <input class="form-control" type="password" name="password" placeholder="">
                    </div>

                    <div class="form-group">  
                        <label for="avatar">Upload new avatar</label>
                        <input class="form-control" type="file" name="avatar" placeholder="">
                    </div>

                    <div class="form-group">  
                        <img src="<?php echo e(asset($user->profile->avatar)); ?>" alt="<?php echo e($user->profile->avatar); ?>" width="180" height="100">
                    </div>

                    <div class="form-group">  
                        <label for="facebook">Facebook profile</label>
                        <input class="form-control" type="text" name="facebook" placeholder="" value="<?php echo e($user->profile->facebook); ?>">
                    </div>

                    <div class="form-group">  
                        <label for="youtube">Youtube profile</label>
                        <input class="form-control" type="text" name="youtube" placeholder="" value="<?php echo e($user->profile->youtube); ?>">
                    </div>

                    <div class="form-group">  
                        <label for="youtube">About you</label>
                        <textarea class="form-control" name="about"  cols="30" rows="10"><?php echo e($user->profile->about); ?></textarea>
                    </div>

                    .<div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update profile</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>