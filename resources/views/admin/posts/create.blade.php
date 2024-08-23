@extends('layouts.admin')

@section('title', 'Create Post')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            {{ __('Create Post') }}
                        </div>
                        <div>
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.posts.store') }}" method="POST">
                            @csrf
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">

                            <label for="content">Content:</label>
                            <textarea name="content" id="content" class="form-control" rows="10" required>{{ old('content') }}</textarea>

                            <button type="submit" class="btn btn-primary mt-3">Create</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
