@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Posts</div>
                    <div class="panel-body">
                        @include('partials/success')
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Author</th>
                                    <th>Options</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($posts as $post) 
                                    <tr>
                                        <th scope="row">{{ $post->id }}</th>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->description }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>
                                            @can('update', $post)
                                                <a href="{{ url("edit-post/$post->id") }}" class="btn btn-primary">
                                                    Edit <i class="glyphicon glyphicon-pencil"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $posts->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection