@extends('layouts.auth.default')

@section('title')
    {{config('app.name')}} Register
@endsection
@section('content')
    <div class="card-header">
        <h3 class="text-center text-3xl font-bold">Register Now</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('postRegister') }}" method="POST">
            @csrf
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Name</span>
                </label>
                <input type="text" name="name" placeholder="Enter Name" class="input input-bordered">
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="text" name="email" placeholder="Enter Email" class="input input-bordered">
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
                <button class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
@endsection
