<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Media Bazaar')</title>

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container-fluid p-0">
        <div class="row w-100 m-0">
            <div class="col-2 pl-0 h-100">
                <div class="sidebar-wrapper">
                    <!-- Sidebar -->
                    <nav class="sidebar">
                        <ul class="p-0">
                            <h2 class="h2 pl-3">profile</h2>
                            <li class="pl-5 pt-5">
                                <a href="{{ route('user.show') }}" class="d-flex">
                                    <i class="fas fa-user"></i>
                                    <h5 class="h5">My profile</h5>
                                </a>
                            </li>
                            <li class="pl-5">
                                <a href="{{ route('user.edit') }}" class="d-flex">
                                    <i class="fas fa-user-edit"></i>
                                    <h5 class="h5 pl-1">Edit profile</h5>
                                </a>
                            </li>
                            <li class="pl-5">
                                <a class="logout_btn" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Top navigation bar -->
            <div class="col-10">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="top-nav mt-1">
                            <h1 class="h1 mb-0 pl-4">@yield('page_header')</h1>
                        </div>
                    </div>
                </div>
                <!-- Put content here -->
                @yield('content')
                <!-- To here -->
            </div>
        </div>
    </div>
    <script src="/js/script.js" defer></script>

</body>
</html>
