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
        <div class="card-header">Create new post</div>
            <div class="card-body">
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">  
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
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
                        @foreach ($tags as $tag)
                            <div class="check-box">
                                <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">  {{$tag->tag}}</label>
                            </div>
                        @endforeach
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
@endsection

@section('script')
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
@endsection

@section('style')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection