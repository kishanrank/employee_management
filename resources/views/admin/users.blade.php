@extends('layouts.admin.default')

@section('title')
    Manage Users
@endsection

@section('css')
    <style>
        .table th:first-child {
            position: inherit !important
        }

    </style>
@endsection

@section('content')
    <div class="flex flex-col w-full md:flex-row">
        <div class="grid flex-grow card">
            @livewire('admin.users')
        </div>
    </div>
@endsection
