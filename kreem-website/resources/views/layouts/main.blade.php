<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Media Bazaar Login')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @yield('fonts')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')

</head>
<body>

<div class="container-fluid">

    <div class="row mr-0">

        <div>
            <img class="col-5 background" src="images/container-bg.svg">
            <img class="Logo-small" src="images/Logo-small.svg">
        </div>

        <div class="col-5">
            <p class="title">Media Bazaar</p>
            <p class="emp-view">Employee view</p>
            <p class="text">The place where employees can check their stats and information</p>
        </div>

        <div class="col">
            @yield('content')
        </div>

    </div>

</div>
</body>
</html>
