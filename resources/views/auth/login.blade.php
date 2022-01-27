@extends('layout.app')
@section('title',' - Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="text-danger mb-2"> 
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('login.index') }}" method="post">
                            @csrf
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
                            <button type="submit"
                                class="btn btn-primary my-2">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
