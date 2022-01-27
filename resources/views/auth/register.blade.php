@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form action="{{ route('register.index') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="d-none">Name</label>
                                <input type="text" name="name" id="name" placeholder="Your Name"
                                    class="form-control my-2 @error('name') border border-danger @enderror"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="username" class="d-none">Username</label>
                                <input type="text" name="username" id="username" placeholder="Your Username"
                                    class="form-control my-2 @error('username') border border-danger @enderror"
                                    value="{{ old('username') }}">
                                @error('username')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="d-none">Email </label>
                                <input type="text" name="email" id="email" placeholder="Your Email"
                                    class="form-control my-2 @error('email') border border-danger @enderror"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="d-none">Password</label>
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="form-control my-2 @error('password') border border-danger @enderror"
                                    value="">
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="d-none">Password again</label>
                                <input type="password" name="password_confirmation" id="password"
                                    placeholder="Repeat Password" class="form-control my-2"
                                    value="">
                            </div>
                            <button type="submit"
                                class="btn btn-primary my-2">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
