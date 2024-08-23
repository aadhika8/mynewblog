@extends('layouts.admin')

@section('title', 'Edit User')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            {{ __('Create User') }}
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

                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ old('name', $user->name) }}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       value="{{ old('email', $user->email) }}">

                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="email">Role:</label>
                                <select name="role" id="role" class="form-control">
                                    @foreach(\App\Models\User::ROLES as $role)
                                        <option
                                            value="{{ $role }}" {{ old('role', $user->role) === $role ? 'selected' : '' }}>{{ $role }}</option>
                                    @endforeach
                                </select>

                                @error('role')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control">

                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div>
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
