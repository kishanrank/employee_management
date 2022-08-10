<!doctype html>
<html data-theme="cupcake">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>
        @yield('title')
    </title>
    @yield('css')
</head>

<body>
    <div class="container">
        <div class="flex flex-col w-full">
            @include('layouts.admin.partials.sidebar')
            @yield('content')
        </div>
    </div>
    @livewireScripts
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
