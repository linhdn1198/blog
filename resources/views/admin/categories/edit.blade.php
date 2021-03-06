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
        <div class="card-header">Cập nhật danh mục</div>
            <div class="card-body">
                <form action="{{route('category.update',['id'=>$category])}}" method="post">
                    @csrf
                    <div class="form-group">  
                    <label for="title">Tên danh mục</label>
                    <input class="form-control" type="text" name="name" placeholder="Nhập tên danh mục" value="{{$category->name}}">
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