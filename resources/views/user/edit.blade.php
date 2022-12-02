@extends('components.main')
@section('title', 'Edit User')
@section('container')
<head> 
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
</head>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card"> 
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body"> 
                        <form action="{{ route('user.update', $user->id) }}" class="forms-sample" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ $user->username }}" required>

                                <!-- error message untuk title -->
                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="fullname">Nama Lengkap</label>
                                <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                    name="fullname" value="{{ $user->fullname }}" required>

                                <!-- error message untuk title -->
                                @error('fullname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">E-mail</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user->email }}" required>

                                <!-- error message untuk title -->
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required>

                                <!-- error message untuk title -->
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> 
                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('user.index') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection