@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-header">Trashed posts</div>
    
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

            <table class="table table-border table-hover">
                <thead>
                    <tr>
                        <th>Featured image</th>
                        <th>Title</th>
                        <th>Editing</th>
                        <th>Restore</th>
                        <th>Deleting</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <tr>
                                
                                <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="180px" height="100px"></td>
                                <td>{{$post->title}}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{route('post.edit',['id'=>$post->id])}}">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-success" href="{{route('post.restore',['id'=>$post->id])}}">
                                        Restore
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-danger" href="{{route('post.kill',['id'=>$post->id])}}">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <th colspan="5" class="text-center">No published posts</th>
                            </tr>
                    @endif

                </tbody>
            </table>
    </div>
</div>
@endsection