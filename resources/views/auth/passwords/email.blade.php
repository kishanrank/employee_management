@extends('layouts.auth.default')

@section('title')
{{config('app.name')}} Forgot password
@endsection
@section('content')
    <div class="card-header">
        <h3 class="text-center text-3xl font-bold">Forgot password?</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="text" name="email" placeholder="email" class="input input-bordered">
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <label class="label">
                </label>
            </div>
            <div class="form-control mt-6">
                <button class="btn btn-primary">Submit</button>
            </div>
            <a href="{{ route('login') }}" class="label-text-alt link link-hover">Goto Login Page</a>
        </form>
    </div>
@endsection
