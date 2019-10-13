@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">Danh sách bài viết đã xóa</div>
    
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>{{Session::get('success')}}</strong> 
                </div>
            @endif

            <table id="table" class="table table-border table-hover">
                <thead>
                    <tr>
                        <th>Hình</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Cập nhật</th>
                        <th>Khôi phục</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <tr>      
                                <th>
                                    <img class="img-fluid" src="{{$post->featured}}" alt="{{$post->title}}">
                                    {{$post->title}}
                                </th>
                                <td>
                                    <a class="btn btn-xs btn-outline-primary" href="{{route('post.edit',['id'=>$post->id])}}">
                                        Cập nhật
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-outline-success" href="{{route('post.restore',['id'=>$post->id])}}">
                                        Khôi phục
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-outline-danger" href="{{route('post.kill',['id'=>$post->id])}}">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <th colspan="5" class="text-center">Không có bài viết nào</th>
                            </tr>
                    @endif

                </tbody>
            </table>
    </div>
</div>
@endsection