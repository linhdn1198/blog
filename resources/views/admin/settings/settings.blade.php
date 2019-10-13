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
        <div class="card-header">Cập nhật cấu hình website</div>
            <div class="card-body">
                <form action="{{route('settings.update')}}" method="post" >
                    @csrf
                    <div class="form-group">  
                        <label for="name">Tên blog</label>
                        <input class="form-control" type="text" name="site_name" placeholder="" value="{{$settings->site_name}}">
                    </div>

                    <div class="form-group">  
                        <label for="contact_number">Địa thoại liên hệ</label>
                        <input class="form-control" type="text" name="contact_number" placeholder="" value="{{$settings->contact_number}}">
                    </div>

                    <div class="form-group">  
                        <label for="contact_email">Email liên hệ</label>
                        <input class="form-control" type="text" name="contact_email" placeholder="" value="{{$settings->contact_email}}">
                    </div>

                    <div class="form-group">  
                        <label for="adress">Địa chỉ</label>
                        <input class="form-control" type="text" name="address" placeholder="" value="{{$settings->address}}">
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