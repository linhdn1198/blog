<?php $__env->startSection('content'); ?>
<div class="card">
        <div class="card-header">
            Published users
        </div>
    
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($users->count() > 0): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img class="img-fluid rounded-circle" src="<?php echo e(asset($user->profile->avatar)); ?>" alt="<?php echo e($user->name); ?>" width="180px" height="100px"></td>
                            <td><?php echo e($user->name); ?></td>
                            <td>
                                <?php if($user->admin==1): ?>
                                <a class="btn btn-xs btn-danger" href="<?php echo e(route('user.not_admin',['id'=>$user->id])); ?>">
                                    Remove permission
                                </a>
                                <?php else: ?>
                                    <a class="btn btn-xs btn-success" href="<?php echo e(route('user.admin',['id'=>$user->id])); ?>">
                                        Make admin
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(Auth::user()->id !== $user->id): ?>
                                    <a class="btn btn-xs btn-danger" href="<?php echo e(route('user.delete',['id'=>$user->id])); ?>">
                                        Delete
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <th colspan="5" class="text-center">No item posts.</th>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>