@extends('layouts.auth.default')

@section('title')
    {{ config('app.name') }} Login
@endsection
@section('content')
    <div class="card-header">
        <h3 class="text-center text-3xl font-bold">Login Now</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('postLogin') }}" method="POST">
            @csrf
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="text" name="email" placeholder="email" class="input input-bordered">
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" name="password" placeholder="password" class="input input-bordered">
                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <label class="label">
                    <a href="{{ route('forgot.password') }}" class="label-text-alt link link-hover">Forgot password?</a>
                </label>
            </div>
            <div class="form-control mt-6">
                <button class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
@endsection
