@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">Danh mục bài viết</div>
        <div class="card-body">
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Đóng</span>
                </button>
                <strong>{{Session::get('success')}}</strong> 
            </div>
            @endif
            <table id="table" class="table table-hover">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Cập nhật</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if($categories->count() > 0)
                        @foreach ($categories as $category)
                            <tr>
                                <th>{{ $category->name }}</th>
                                <td>
                                    <a class="btn btn-xs btn-outline-primary" href="{{ route('category.edit',['id'=>$category->id]) }}">
                                        Cập nhật
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-outline-danger" href="{{ route('category.delete',['id'=>$category->id]) }}">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <th colspan="3" class="text-center">Không có danh mục bài viết nào.</th>
                            </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection