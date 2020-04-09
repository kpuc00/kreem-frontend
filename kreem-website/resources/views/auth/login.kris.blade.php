<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Media Bazaar Login')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
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
        
        <div class="col login">
            
            <p class="login-title">Log in</p>
            
            <form>
                <div class="form-group mb-4">
                    <input type="email" class="form-control" placeholder="Email" id="email">
                </div>
                <div class="form-group mb-4">
                    <input type="password" class="form-control" placeholder="Password" id="password">
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                    <label class="custom-control-label" for="rememberMe">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Log in</button>
            </form>
            
        </div>
    </div>
    
</div>
</body>
</html>
