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
        <div class="card-header">Create new post</div>
            <div class="card-body">
                <form action="<?php echo e(route('post.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">  
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">  
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="featured">Featured image</label>
                        <input class="form-control" type="file" name="featured" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="tags">Selected tags</label>
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="check-box">
                                <label><input type="checkbox" name="tags[]" value="<?php echo e($tag->id); ?>">  <?php echo e($tag->tag); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="form-group">  
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" id="summernote" cols="30" rows="5"></textarea>
                    </div>

                    .<div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Store post</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Content post...',
                tabsize: 2,
                height: 200
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>