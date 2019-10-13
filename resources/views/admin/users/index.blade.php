@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">
            Danh sách người dùng
        </div>
    
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
                        <th>Hình ảnh</th>
                        <th>Họ tên</th>
                        <th>Quyền</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                        @foreach ($users as $user)
                        <tr>
                            <td><img class="img-fluid" src="{{asset($user->profile->avatar)}}" alt="{{$user->name}}" width="180px" height="100px"></td>
                            <td>{{$user->name}}</td>
                            <td>
                                @if ($user->admin==1)
                                <a class="btn btn-xs btn-outline-danger" href="{{route('user.not_admin',['id'=>$user->id])}}">
                                    Xóa quyền
                                </a>
                                @else
                                    <a class="btn btn-xs btn-outline-success" href="{{route('user.admin',['id'=>$user->id])}}">
                                       Bổ nhiệm Admin
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if (Auth::user()->id !== $user->id)
                                    <a class="btn btn-xs btn-outline-danger" href="{{route('user.delete',['id'=>$user->id])}}">
                                        Xóa
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">Không có người dùng nào.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection