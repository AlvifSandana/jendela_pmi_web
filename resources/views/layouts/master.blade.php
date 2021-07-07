<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    @include('layouts.head')
    <title>Jendela PMI - @yield('title')</title>
    @include('layouts.css')
    @yield('css')
</head>

<body>
    <!-- Left Panel -->
    @include('layouts.sidebar')
    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('layouts.header')
        <!-- Header-->

        <!-- Content -->
        @yield('content')
        <!-- .content -->
    </div>
    <!-- Right Panel -->

    <!-- JS -->
    @include('layouts.js')
    @yield('js')
    <!-- JS -->
</body>

</html>
