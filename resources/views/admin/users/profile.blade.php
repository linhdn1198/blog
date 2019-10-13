@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{$error}}</strong>
            </div>
        @endforeach
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{Session::get('success')}}</strong> 
        </div>
    @endif
    <div class="card">
        <div class="card-header">Cập nhật thông tin cá nhân</div>
            <div class="card-body">
                <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">  
                        <label for="name">Họ tên</label>
                        <input class="form-control" type="text" name="name" placeholder="" value="{{$user->name}}" placeholder="Nhập họ tên">
                    </div>

                    <div class="form-group">  
                        <label for="email">E-mail</label>
                        <input class="form-control" type="text" name="email" placeholder="" value="{{$user->email}}" placeholder="Nhập email">
                    </div>

                    <div class="form-group">  
                        <label for="password">Mật khẩu mới</label>
                        <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu mới">
                    </div>

                    <div class="form-group">  
                        <label for="avatar">Cập nhật hình ảnh</label>
                        <input class="form-control" type="file" name="avatar" placeholder="">
                    </div>

                    <div class="form-group">  
                        <img src="{{asset($user->profile->avatar)}}" alt="{{$user->profile->avatar}}" width="180" height="100">
                    </div>

                    <div class="form-group">  
                        <label for="facebook">Link facebook</label>
                        <input class="form-control" type="text" name="facebook" placeholder="Nhập link facebook" value="{{$user->profile->facebook}}">
                    </div>

                    <div class="form-group">  
                        <label for="youtube">Link youtube</label>
                        <input class="form-control" type="text" name="youtube" placeholder="Nhập link youtube" value="{{$user->profile->youtube}}">
                    </div>

                    <div class="form-group">  
                        <label for="about">Giới thiệu</label>
                        <textarea class="form-control" name="about" id="summernote"  cols="30" rows="10">{{$user->profile->about}}</textarea>
                    </div>

                    .<div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
@endsection

@section('script')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Nhập nội dung bài viết...',
                tabsize: 2,
                height: 200
            });
        });
    </script>
@endsection

@section('style')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection
