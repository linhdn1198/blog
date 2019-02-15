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
        <div class="card-header">Edit your profile</div>
            <div class="card-body">
                <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">  
                        <label for="name">Username</label>
                        <input class="form-control" type="text" name="name" placeholder="" value="{{$user->name}}">
                    </div>

                    <div class="form-group">  
                        <label for="email">E-mail</label>
                        <input class="form-control" type="text" name="email" placeholder="" value="{{$user->email}}">
                    </div>

                    <div class="form-group">  
                        <label for="password">New password</label>
                        <input class="form-control" type="password" name="password" placeholder="">
                    </div>

                    <div class="form-group">  
                        <label for="avatar">Upload new avatar</label>
                        <input class="form-control" type="file" name="avatar" placeholder="">
                    </div>

                    <div class="form-group">  
                        <img src="{{asset($user->profile->avatar)}}" alt="{{$user->profile->avatar}}" width="180" height="100">
                    </div>

                    <div class="form-group">  
                        <label for="facebook">Facebook profile</label>
                        <input class="form-control" type="text" name="facebook" placeholder="" value="{{$user->profile->facebook}}">
                    </div>

                    <div class="form-group">  
                        <label for="youtube">Youtube profile</label>
                        <input class="form-control" type="text" name="youtube" placeholder="" value="{{$user->profile->youtube}}">
                    </div>

                    <div class="form-group">  
                        <label for="youtube">About you</label>
                        <textarea class="form-control" name="about"  cols="30" rows="10">{{$user->profile->about}}</textarea>
                    </div>

                    .<div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update profile</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
@endsection