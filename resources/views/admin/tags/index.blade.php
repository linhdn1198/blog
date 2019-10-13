@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">Danh sách thẻ</div>
    
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
            
            <table id="table" class="table table-hover">
                <thead>
                    <tr>
                        <th>Tên thẻ</th>
                        <th>Cập nhật</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if($tags->count() > 0)
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{$tag->tag}}</td>
                                <td>
                                    <a class="btn btn-xs btn-outline-primary" href="{{route('tag.edit',['id'=>$tag->id])}}">
                                        Cập nhật
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-outline-danger" href="{{route('tag.delete',['id'=>$tag->id])}}">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <th colspan="3" class="text-center">Không có thẻ nào.</th>
                            </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection