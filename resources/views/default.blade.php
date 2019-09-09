<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-name" content="{{ $appName }}">
    <title>{{ $appTitle }}</title>
    <link rel="stylesheet" href="/assets/material-icons/icon.css">
    <link rel="stylesheet" href="/assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @yield('main-head')
    @yield('main-css')
</head>

<body>
    @include('app.menus')
    <div class="row no-gutters">
        <div class="col-auto">
            @yield('app-menus')
        </div>
        <div class="col">
            <div id="app-header" class="app-header">
                <i class="material-icons app-header--menus-icon" v-show="!expand" @click="onExpand()">menu</i>
                <i class="material-icons app-header--menus-icon" v-show="expand" @click="onCollapse()">chevron_left</i>
                header
            </div>
            <div class="container-fluid">
                @yield('main-content')
            </div>
        </div>
    </div>

    <script src="{{ mix('/js/default.js') }}"></script>
    @yield('main-js')
</body>

</html>
