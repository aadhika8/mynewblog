@extends('layouts.admin')

@section('title', 'Posts')
@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ __('Posts') }}
                            </div>
                            <div>
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create</a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            @foreach ($posts as $post)
                                <tr>
                                    <td><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a> </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                                        <form onsubmit="return confirm('Are you sure? This action cannot be undone')" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                            {{ $posts->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
