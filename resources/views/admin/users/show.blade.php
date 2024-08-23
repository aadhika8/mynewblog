@extends('layouts.admin')

@section('title', 'View Post')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            {{ __('View User') }}
                        </div>
                        <div>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Back</a>
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

                        <p>
                            <strong>Name:</strong> {{ $user->name }}
                        </p>

                        <p>
                            <strong>Email:</strong> {{ $user->email }}
                        </p>

                        <p>
                            <strong>Role:</strong> {{ $user->role }}
                        </p>

                        <p>
                            <strong>Created at:</strong> {{ $user->created_at }}
                        </p>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
