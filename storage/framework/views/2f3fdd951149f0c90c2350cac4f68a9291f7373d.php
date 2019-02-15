<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="list-group-item"><a href="<?php echo e(route('category.index')); ?>">Categories</a></li>
                            <li class="list-group-item"><a href="<?php echo e(route('tag.index')); ?>">Tags</a></li>

                            <?php if(Auth::user()->admin): ?>
                                <li class="list-group-item"><a href="<?php echo e(route('user.index')); ?>">Users</a></li>
                                <li class="list-group-item"><a href="<?php echo e(route('user.create')); ?>">New user</a></li>
                            <?php endif; ?>
                            <li class="list-group-item"><a href="<?php echo e(route('user.profile')); ?>">My profile</a></li>
                            <li class="list-group-item"><a href="<?php echo e(route('tag.create')); ?>">Create tag</a></li>
                            <li class="list-group-item"><a href="<?php echo e(route('post.index')); ?>">All posts</a></li>
                            <li class="list-group-item"><a href="<?php echo e(route('post.trash')); ?>">All trashed posts</a></li>
                            <li class="list-group-item"><a href="<?php echo e(route('category.create')); ?>">Create new category</a></li>
                            <li class="list-group-item"><a href="<?php echo e(route('post.create')); ?>">Create new post</a></li>
                            <?php if(Auth::user()->admin): ?>
                                <li class="list-group-item"><a href="<?php echo e(route('settings')); ?>">Settings</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
        
                    <div class="col-lg-8">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>" ></script>
    <script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
    <script>
        <?php if(Session::has('success')): ?>
            toastr.success("<?php echo e(Session::get('success')); ?>")
        <?php endif; ?>

        <?php if(Session::has('info')): ?>
            toastr.success("<?php echo e(Session::get('info')); ?>")
        <?php endif; ?>
    </script>
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>
