<!doctype html>
<html data-theme="cupcake">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>
        @yield('title')
    </title>
</head>

<body>
    <div class="flex flex-col w-full md:flex-row">
        <div class="hero min-h-screen bg-base-200">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100" style="min-width: 500px">
                    @include('layouts.auth.partials.notification')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
