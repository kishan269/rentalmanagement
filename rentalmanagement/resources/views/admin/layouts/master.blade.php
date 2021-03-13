<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('admin.layouts.styles')
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('admin.layouts.header')

    @include('admin.layouts.main-sidebar')

    <div class="content-wrapper">
        <div class="modal" id="emailmodel">

        </div>
    @include('admin.layouts.success')
    @include('admin.layouts.errors')

    @yield('content')
    </div>
    @include('admin.layouts.footer')
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
@include('admin.layouts.scripts')
@yield('scripts')
</body>
</html>
