<?php $__env->startSection('content'); ?>
<div class="card">
        <div class="card-header">Published tags</div>
    
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
                        <th>Tag name</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($tags->count() > 0): ?>
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($tag->tag); ?></td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('tag.edit',['id'=>$tag->id])); ?>">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-danger" href="<?php echo e(route('tag.delete',['id'=>$tag->id])); ?>">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                            <tr>
                                <th colspan="3" class="text-center">No tag yet.</th>
                            </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>