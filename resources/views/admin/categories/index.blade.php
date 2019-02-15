@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">Published categories</div>
    
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
                        <th>Category name</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </tr>
                </thead>
                <tbody>
                    @if($categories->count() > 0)
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{route('category.edit',['id'=>$category->id])}}">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-danger" href="{{route('category.delete',['id'=>$category->id])}}">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <th colspan="3" class="text-center">No category yet.</th>
                            </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection