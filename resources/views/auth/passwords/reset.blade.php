@extends('layouts.auth.default')

@section('title')
{{config('app.name')}} Change password
@endsection
@section('content')
    <div class="card-header">
        <h3 class="text-center text-3xl font-bold">Change password</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="text" name="email" placeholder="email" value="{{ $email ?? old('email') }}"
                    class="input input-bordered" required>
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
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Confirm Password</span>
                </label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                    class="input input-bordered">
            </div>
            <div class="form-control mt-6">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
