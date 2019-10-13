<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{asset('css/toastr.css')}}" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{route('home')}}">Trang chủ</a></li>
                            <li class="list-group-item"><a href="{{route('category.index')}}">Danh mục bài viết</a></li>
                            <li class="list-group-item"><a href="{{route('category.create')}}">Thêm danh mục bài viết</a></li>
                            <li class="list-group-item"><a href="{{route('tag.index')}}">Danh sách thẻ</a></li>
                            <li class="list-group-item"><a href="{{route('tag.create')}}">Thêm mới thẻ</a></li>
                            <li class="list-group-item"><a href="{{route('post.index')}}">Danh sách bài viết</a></li>
                            <li class="list-group-item"><a href="{{route('post.trash')}}">Danh sách bài viết đã xóa</a></li>
                            <li class="list-group-item"><a href="{{route('post.create')}}">Thêm mới bài viết</a></li>
                            @if (Auth::user()->admin)
                                <li class="list-group-item"><a href="{{route('user.index')}}">Danh sách người dùng</a></li>
                                <li class="list-group-item"><a href="{{route('user.create')}}">Thêm mới người dùng</a></li>
                            @endif
                            <li class="list-group-item"><a href="{{route('user.profile')}}">Thông tin cá nhân</a></li>
                            @if (Auth::user()->admin)
                                <li class="list-group-item"><a href="{{route('settings')}}">Cấu hình</a></li>
                            @endif
                        </ul>
                    </div>
        
                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#table').DataTable({
            "language": {
                "search": "Tìm kiếm:",
                "paginate": {
                "sFirst": "Trang đầu",
                "sLast": "Trang cuối",
                "sNext": "Trang sau" ,
                "sPrevious": "Trang trước",          
                },
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Hiển thị từ _START_ tới _END_ của _TOTAL_ bản ghi",
                "lengthMenu": "Hiện _MENU_ bản ghi",         
            },
            "bInfo" : false,
            });
        });	
    </script>
    @yield('script')
</body>
</html>
