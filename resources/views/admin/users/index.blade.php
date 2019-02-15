@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">
            Published users
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

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                        @foreach ($users as $user)
                        <tr>
                            <td><img class="img-fluid rounded-circle" src="{{asset($user->profile->avatar)}}" alt="{{$user->name}}" width="180px" height="100px"></td>
                            <td>{{$user->name}}</td>
                            <td>
                                @if ($user->admin==1)
                                <a class="btn btn-xs btn-danger" href="{{route('user.not_admin',['id'=>$user->id])}}">
                                    Remove permission
                                </a>
                                @else
                                    <a class="btn btn-xs btn-success" href="{{route('user.admin',['id'=>$user->id])}}">
                                        Make admin
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if (Auth::user()->id !== $user->id)
                                    <a class="btn btn-xs btn-danger" href="{{route('user.delete',['id'=>$user->id])}}">
                                        Delete
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No item posts.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection