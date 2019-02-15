@extends('layouts.app')

@section('content')
@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{Session::get('error')}}</strong>
    </div>
@endif
@if (Session::has('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{Session::get('info')}}</strong> 
</div>
@endif
<div class="row text-center">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">POSTED</div>
        
            <div class="card-body">
                <h1>{{$posts_count}}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">TRASHED</div>
        
            <div class="card-body">
                <h1>{{$trashed_count}}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">USERS</div>
        
            <div class="card-body">
                <h1>{{$users_count}}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">CATEGORIES</div>
        
            <div class="card-body">
                <h1>{{$categories_count}}</h1>
            </div>
        </div>
    </div>
</div>
@endsection
