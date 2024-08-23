@extends('layouts.admin')

@section('title', 'View Post')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            {{ __('View Posts') }}
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

                        <h1> {{ $post->title }} </h1>
                        <p> {{ $post->content }} </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
