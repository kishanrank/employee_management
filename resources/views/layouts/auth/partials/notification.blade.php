@if (Session::has('message') && Session::has('alert-type') && Session::get('alert-type') == 'success')
    <span class="text-green-500">{!! Session::get('message') !!}</span>
@endif

@if (Session::has('message') && Session::has('alert-type') && Session::get('alert-type') == 'error')
    <span class="text-red-500">{!! Session::get('message') !!}</span>
@endif

@if (Session::has('message') && Session::has('alert-type') && Session::get('alert-type') == 'warning')
    <span class="text-red-500">{!! Session::get('message') !!}</span>
@endif

@if (Session::has('message') && Session::has('alert-type') && Session::get('alert-type') == 'info')
    <span class="text-info-500">{!! Session::get('message') !!}</span>
@endif
