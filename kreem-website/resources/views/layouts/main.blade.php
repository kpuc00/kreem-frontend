<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Media Bazaar')</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')
    
    <!-- Fonts -->
    @yield('fonts')
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @yield('styles')
    
</head>
<body>

    <div class="container-fluid m-0 p-0">
    
        <div class="row m-0">
            
            <div class="col-5 m-0 p-0">
                <div class="leftside-wrapper">
                    <h3 class="m-0 pt-5">Media Bazaar</h3>
                    <h4 class="m-0 pt-3 pb-5">Employee view</h4>
                    <h5 class="text m-0 pt-5">The place where employees can check their stats and information</h5>

                    <img class="logo-small m-0" src="images/Logo-small.svg">
                </div>
                </div>
                
                

            <div class="col-7 m-0 p-0">
                <div class="rightside-wrapper pl-5 pr-5">
                @yield('content')
                </div>                
            </div>
    
        </div>
    
    </div>

</body>
</html>
