<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <article class="hentry post post-standard has-post-thumbnail sticky">
                    <div class="post-thumb">
                        <img src="<?php echo e($first_post->featured); ?>" alt="<?php echo e($first_post->title); ?>">
                        <div class="overlay"></div>
                        <a href="<?php echo e($first_post->featured); ?>" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="#" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="<?php echo e(route('post.single',['slug'=>$first_post->slug])); ?>"><?php echo e($first_post->title); ?></a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="<?php echo e($first_post->created_at->toFormattedDateString()); ?>">
                                            <?php echo e($first_post->created_at->toFormattedDateString()); ?>

                                        </time>

                                    </span>
                                    
                                    
                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        <a href="<?php echo e(route('category.single',['slug'=>$first_post->category->id])); ?>"><?php echo e($first_post->category->name); ?></a>
                                    </span>

                                    <span class="post__comments">
                                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                        6
                                    </span>
                                </div>
                        </div>
                    </div>

            </article>
        </div>
        <div class="col-lg-2"></div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="<?php echo e($second_post->featured); ?>" alt="<?php echo e($second_post->title); ?>">
                        <div class="overlay"></div>
                        <a href="<?php echo e($second_post->featured); ?>" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="#" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="<?php echo e(route('post.single',['slug'=>$second_post->slug])); ?>"><?php echo e($second_post->title); ?></a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="<?php echo e($second_post->created_at->toFormattedDateString()); ?>">
                                            <?php echo e($second_post->created_at->toFormattedDateString()); ?>

                                        </time>

                                    </span>
                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        <a href="<?php echo e(route('category.single',['slug'=>$second_post->category->id])); ?>"><?php echo e($second_post->category->name); ?></a>
                                    </span>

                                    <span class="post__comments">
                                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                        6
                                    </span>
                                </div>
                        </div>
                    </div>

            </article>
        </div>
        <div class="col-lg-6">
            <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="<?php echo e($third_post->featured); ?>" alt="<?php echo e($third_post->title); ?>">
                        <div class="overlay"></div>
                        <a href="<?php echo e($third_post->featured); ?>" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="#" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="<?php echo e(route('post.single',['slug'=>$third_post->slug])); ?>"><?php echo e($third_post->title); ?></a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="<?php echo e($third_post->created_at->toFormattedDateString()); ?>">
                                            <?php echo e($third_post->created_at->toFormattedDateString()); ?>

                                        </time>

                                    </span>
                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        <a href="<?php echo e(route('category.single',['slug'=>$third_post->category->id])); ?>"><?php echo e($third_post->category->name); ?></a>
                                    </span>

                                    <span class="post__comments">
                                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                        6
                                    </span>
                                </div>
                        </div>
                    </div>

            </article>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row medium-padding120 bg-border-color">
        <div class="container">
            <div class="col-lg-12">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title"><?php echo e($category->name); ?></h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            <?php $__currentLoopData = $category->post->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="case-item">
                                        <div class="case-item__thumb">
                                            <img src="<?php echo e($post->featured); ?>" alt="our case">
                                        </div>
                                        <h6 class="case-item__title"><a href="<?php echo e(route('post.single',['slug'=>$post->slug])); ?>"><?php echo e($post->title); ?></a></h6>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>