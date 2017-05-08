<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ config('e.description', '') }}">
    <meta name="author" content="{{ config('e.author', '') }}">
    <meta name="keyword" content="{{ config('e.keyword', '') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Excel Manage System') }}</title>

    @include('comments.style')
    @yield('style')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>
<section id="container" class="">
    <!--header start-->
    @include('comments.header')
    <!--header end-->

    <!--sidebar start-->
    @include('comments.aside')
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            @yield('warpper')
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
</section>
@include('comments.script')
@yield('script')
</body>
</html>
