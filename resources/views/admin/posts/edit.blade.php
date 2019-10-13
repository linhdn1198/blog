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
        <div class="card-header">Cập nhật bài viết</div>
            <div class="card-body">
                <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">  
                        <label for="category_id">Danh mục bài viết</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">  
                        <label for="title">Tiêu đề</label>
                        <input class="form-control" type="text" name="title" placeholder="Nhập tiêu đề bài viết" value="{{$post->title}}">
                    </div>

                    <div class="form-group">
                        <label for="featured">Hình ảnh</label>
                        <input class="form-control" type="file" name="featured" placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <img class="img-fluid" src="{{$post->featured}}" alt="{{$post->title}}" width="180" height="100">
                    </div>

                    <div class="form-group">
                        <label for="tags">Chọn thẻ</label>
                        @foreach ($tags as $tag)
                            <div class="check-box">
                                <label><input type="checkbox" name="tags[]" value="{{$tag->id}}" 
                                @foreach ($post->tags as $t)
                                    @if ($t->id == $tag->id)
                                        {{'checked'}}
                                    @endif
                                @endforeach

                                >  {{$tag->tag}}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">  
                        <label for="content">Nội dung</label>
                        <textarea class="form-control" name="content" id="summernote" cols="30" rows="5">{{$post->content}}</textarea>
                    </div>

                    <div class="form-group">
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