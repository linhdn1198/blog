<?php $__env->startSection('content'); ?>
<div class="card">
        <div class="card-header">
            Published posts
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
                        <th>Featured image</th>
                        <th>Title</th>
                        <th>Deleting</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($posts->count() > 0): ?>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            
                            <td><img class="img-fluid rounded-circle" src="<?php echo e($post->featured); ?>" alt="<?php echo e($post->title); ?>" width="180px" height="100px"></td>
                            <td><?php echo e($post->title); ?></td>
                            <td>
                                <a class="btn btn-xs btn-danger" href="<?php echo e(route('post.delete',['id'=>$post->id])); ?>">
                                    Trash
                                </a>
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